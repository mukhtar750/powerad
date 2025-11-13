<?php

namespace App\Http\Controllers;

use App\Models\Billboard;
use App\Models\Booking;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminBillboardController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->middleware('auth');
        $this->notificationService = $notificationService;
    }

    protected function authorizeAdmin()
    {
        $user = Auth::user();
        if (!$user || strtolower($user->role) !== 'admin') {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Show form to create a new billboard as admin.
     */
    public function create()
    {
        $this->authorizeAdmin();

        $loaps = User::where('role', 'loap')->orderBy('name')->get();

        return view('dashboards.admin.billboard-create', [
            'loaps' => $loaps,
        ]);
    }

    /**
     * Store a newly created billboard (admin-created, assign to selected LOAP).
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'owner_user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'size' => 'required|string|max:50',
            'type' => 'required|string|in:Digital,Static,LED,Traditional',
            'orientation' => 'required|string|in:Portrait,Landscape',
            'price_per_day' => 'required|numeric|min:0',
            'price_per_week' => 'required|numeric|min:0',
            'price_per_month' => 'required|numeric|min:0',
            'features' => 'nullable|string|max:1000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $owner = User::find($request->owner_user_id);
        if (!$owner || $owner->role !== 'loap') {
            return back()->withErrors(['owner_user_id' => 'Selected owner must be a LOAP user.'])->withInput();
        }

        $data = $request->only([
            'title','description','location','address','city','state','country','latitude','longitude','size','type','orientation','price_per_day','price_per_week','price_per_month'
        ]);
        $data['user_id'] = $owner->id;

        // Handle features as array
        if ($request->filled('features')) {
            $data['features'] = array_filter(explode(',', $request->features));
        }

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('billboards', 'public');
                $imagePaths[] = $path;
            }
            $data['images'] = $imagePaths;
            $data['main_image'] = $imagePaths[0] ?? null;
        }

        Billboard::create($data);

        return redirect()->route('dashboard.admin.billboards')
            ->with('success', 'Billboard created successfully and assigned to LOAP.');
    }

    public function index(Request $request)
    {
        $this->authorizeAdmin();

        $query = Billboard::with(['user', 'bookings']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by verification status
        if ($request->filled('verified')) {
            $verified = $request->boolean('verified');
            $query->where('is_verified', $verified);
        }

        // Filter by active status
        if ($request->filled('active')) {
            $active = $request->boolean('active');
            $query->where('is_active', $active);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by city
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Sort options
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
        switch ($sortBy) {
            case 'title':
                $query->orderBy('title', $sortOrder);
                break;
            case 'price':
                $query->orderBy('price_per_day', $sortOrder);
                break;
            case 'location':
                $query->orderBy('city', $sortOrder)->orderBy('location', $sortOrder);
                break;
            case 'owner':
                $query->join('users', 'billboards.user_id', '=', 'users.id')
                      ->orderBy('users.name', $sortOrder)
                      ->select('billboards.*');
                break;
            default:
                $query->orderBy('created_at', $sortOrder);
        }

        $billboards = $query->paginate(15)->appends($request->query());

        // Get filter options
        $cities = Billboard::distinct()->pluck('city')->sort()->values();
        $types = Billboard::distinct()->pluck('type')->sort()->values();

        return view('dashboards.admin.billboards', compact('billboards', 'cities', 'types'));
    }

    public function verifications(Request $request)
    {
        $this->authorizeAdmin();
        
        $query = Billboard::where('is_verified', false)->with('user');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $billboards = $query->latest()->paginate(15)->appends($request->query());

        return view('dashboards.admin.verifications', compact('billboards'));
    }

    public function show(Billboard $billboard)
    {
        $this->authorizeAdmin();
        
        $billboard->load(['user', 'bookings' => function($q) {
            $q->with('advertiser')->orderBy('created_at', 'desc');
        }]);

        // Get statistics
        $stats = [
            'total_bookings' => $billboard->bookings()->count(),
            'active_bookings' => $billboard->bookings()->where('status', 'active')->count(),
            'total_revenue' => $billboard->bookings()->where('payment_status', 'paid')->sum('total_amount'),
            'total_commission' => $billboard->bookings()->where('payment_status', 'paid')->sum('company_commission'),
        ];

        return view('dashboards.admin.billboard-show', compact('billboard', 'stats'));
    }

    public function verify(Request $request, Billboard $billboard)
    {
        $this->authorizeAdmin();
        
        $request->validate([
            'notes' => 'nullable|string|max:500'
        ]);

        $billboard->update([
            'is_verified' => true,
            'verified_at' => now(),
            'verified_by' => Auth::id(),
            'verification_notes' => $request->notes
        ]);

        Log::info('Billboard verified', [
            'billboard_id' => $billboard->id,
            'admin_id' => Auth::id(),
            'notes' => $request->notes
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Billboard verified successfully'
        ]);
    }

    public function unverify(Request $request, Billboard $billboard)
    {
        $this->authorizeAdmin();
        
        $request->validate([
            'reason' => 'required|string|max:500'
        ]);

        $billboard->update([
            'is_verified' => false,
            'verification_notes' => $request->reason
        ]);

        Log::info('Billboard unverified', [
            'billboard_id' => $billboard->id,
            'admin_id' => Auth::id(),
            'reason' => $request->reason
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Billboard unverified successfully'
        ]);
    }

    public function toggleActive(Billboard $billboard)
    {
        $this->authorizeAdmin();
        
        $billboard->update([
            'is_active' => !$billboard->is_active,
            'status' => !$billboard->is_active ? 'available' : 'inactive'
        ]);

        $status = $billboard->is_active ? 'activated' : 'deactivated';

        Log::info('Billboard status changed', [
            'billboard_id' => $billboard->id,
            'admin_id' => Auth::id(),
            'new_status' => $status
        ]);

        return response()->json([
            'success' => true,
            'message' => "Billboard {$status} successfully",
            'is_active' => $billboard->is_active
        ]);
    }

    public function bulkAction(Request $request)
    {
        $this->authorizeAdmin();
        
        $request->validate([
            'action' => 'required|in:verify,unverify,activate,deactivate,delete',
            'billboard_ids' => 'required|array|min:1',
            'billboard_ids.*' => 'exists:billboards,id'
        ]);

        $billboardIds = $request->billboard_ids;
        $action = $request->action;
        $count = 0;

        DB::transaction(function () use ($billboardIds, $action, &$count) {
            foreach ($billboardIds as $billboardId) {
                $billboard = Billboard::find($billboardId);
                
                switch ($action) {
                    case 'verify':
                        $billboard->update(['is_verified' => true, 'verified_at' => now(), 'verified_by' => Auth::id()]);
                        break;
                    case 'unverify':
                        $billboard->update(['is_verified' => false]);
                        break;
                    case 'activate':
                        $billboard->update(['is_active' => true, 'status' => 'available']);
                        break;
                    case 'deactivate':
                        $billboard->update(['is_active' => false, 'status' => 'inactive']);
                        break;
                    case 'delete':
                        $billboard->delete();
                        break;
                }
                $count++;
            }
        });

        Log::info('Bulk action performed', [
            'action' => $action,
            'billboard_count' => $count,
            'admin_id' => Auth::id()
        ]);

        $pastTense = [
            'verify' => 'verified',
            'unverify' => 'unverified',
            'activate' => 'activated',
            'deactivate' => 'deactivated',
            'delete' => 'deleted',
        ][$action] ?? $action;

        $noun = Str::plural('billboard', $count);
        $message = "Bulk action completed. {$count} {$noun} {$pastTense}.";

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
        }

        return redirect()->route('dashboard.admin.billboards')->with('status', $message);
    }

    public function getStats()
    {
        $this->authorizeAdmin();
        
        $stats = [
            'total_billboards' => Billboard::count(),
            'verified_billboards' => Billboard::where('is_verified', true)->count(),
            'pending_verification' => Billboard::where('is_verified', false)->count(),
            'active_billboards' => Billboard::where('is_active', true)->count(),
            'total_bookings' => Booking::count(),
            'active_bookings' => Booking::where('status', 'active')->count(),
            'total_revenue' => Booking::where('payment_status', 'paid')->sum('total_amount'),
            'total_commission' => Booking::where('payment_status', 'paid')->sum('company_commission'),
        ];

        return response()->json($stats);
    }
}


