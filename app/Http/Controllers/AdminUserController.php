<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || strtolower($user->role) !== 'admin') {
            abort(403, 'Unauthorized');
        }
    }

    public function index(Request $request)
    {
        $this->authorizeAdmin();

        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->string('role'));
        }

        $users = $query->latest()->paginate(15)->appends($request->query());

        return view('dashboards.admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        $this->authorizeAdmin();
        return view('dashboards.admin.user-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeAdmin();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required', 'in:admin,loap,advertiser,regulator,service_provider'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'is_verified' => ['nullable', 'boolean'],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'id_card' => ['nullable', 'image', 'max:4096'],
        ]);
        // Handle files
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('users/avatars', 'public');
            $user->avatar_path = $path;
        }
        if ($request->hasFile('id_card')) {
            $path = $request->file('id_card')->store('users/id_cards', 'public');
            $user->id_card_path = $path;
        }

        $user->fill($validated);
        $user->is_verified = (bool) $request->boolean('is_verified');
        $user->save();

        return redirect()->route('dashboard.admin.users.index')->with('status', 'User updated');
    }

    public function verify(User $user)
    {
        $this->authorizeAdmin();
        $user->is_verified = true;
        $user->save();
        return back()->with('status', 'User verified');
    }

    public function unverify(User $user)
    {
        $this->authorizeAdmin();
        $user->is_verified = false;
        $user->save();
        return back()->with('status', 'User unverified');
    }

    public function destroy(User $user)
    {
        $this->authorizeAdmin();
        if (Auth::id() === $user->id) {
            return back()->withErrors(['error' => 'You cannot delete your own account.']);
        }
        $user->delete();
        return back()->with('status', 'User deleted');
    }

    /**
     * Show a user's full details for admin.
     */
    public function show(User $user)
    {
        $this->authorizeAdmin();

        $accountInfo = null;

        if ($user->isLoap()) {
            $accountInfo = [
                'type' => 'loap',
                'subaccount_code' => $user->paystack_subaccount_code,
                'subaccount_id' => $user->paystack_subaccount_id,
                'bank_name' => $user->bank_name,
                'account_number_masked' => $user->account_number ? ('****' . substr($user->account_number, -4)) : null,
                'account_name' => $user->account_name,
            ];
        } elseif ($user->isServiceProvider()) {
            $accountInfo = [
                'type' => 'service_provider',
                'provider_subaccount_code' => config('services.paystack.provider_subaccount_code'),
            ];
        }

        $stats = null;
        if ($user->isLoap()) {
            $totalBillboards = $user->billboards()->count();
            $totalPaid = DB::table('bookings')
                ->join('billboards', 'bookings.billboard_id', '=', 'billboards.id')
                ->where('billboards.user_id', $user->id)
                ->where('bookings.payment_status', 'paid')
                ->sum('bookings.total_amount');
            $stats = [
                'billboards' => $totalBillboards,
                'total_paid' => $totalPaid,
            ];
        }

        return view('dashboards.admin.user-show', [
            'user' => $user,
            'accountInfo' => $accountInfo,
            'stats' => $stats,
        ]);
    }
}


