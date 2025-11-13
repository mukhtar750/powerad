<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            $userRole = strtolower($user->role);

            // Handle role-based redirects with proper role matching
            switch ($userRole) {
                case 'advertiser':
                    return redirect()->intended('/dashboard/advertiser');
                case 'regulator':
                    // Route regulators to specific dashboards based on subtype
                    $type = strtolower($user->regulator_type ?? '');
                    if ($type === 'arcon') {
                        return redirect()->intended('/dashboard/arcon');
                    }
                    return redirect()->intended('/dashboard/state-regulator');
                case 'service_provider':
                case 'serviceprovider':
                    return redirect()->intended('/dashboard/serviceprovider');
                case 'admin':
                    return redirect()->intended('/dashboard/admin');
                case 'loap':
                default:
                    return redirect()->intended('/dashboard/loap');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Base validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:loap,advertiser,regulator,service_provider',
        ];

        // Additional fields for regulator role
        if (strtolower($request->input('role')) === 'regulator') {
            $rules['regulator_type'] = 'required|string|in:arcon,state';
            // Optional agency name; required if provided to be a string
            $rules['regulator_agency'] = 'nullable|string|max:150';
            // State required when regulator_type is 'state'
            $rules['state'] = 'required_if:regulator_type,state|string|max:100';
        }

        $validated = $request->validate($rules);

        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ];

        // Persist regulator subtype details if applicable
        if (strtolower($validated['role']) === 'regulator') {
            $userData['regulator_type'] = strtolower($validated['regulator_type']);
            $userData['regulator_agency'] = $validated['regulator_agency'] ?? null;
            $userData['state'] = $validated['state'] ?? null;
        }

        $user = User::create($userData);

        Auth::login($user);

        // Redirect to appropriate dashboard based on role
        $role = strtolower($validated['role']);
        switch ($role) {
            case 'advertiser':
                return redirect()->intended('/dashboard/advertiser');
            case 'regulator':
                $type = strtolower($user->regulator_type ?? '');
                if ($type === 'arcon') {
                    return redirect()->intended('/dashboard/arcon');
                }
                return redirect()->intended('/dashboard/state-regulator');
            case 'service_provider':
                return redirect()->intended('/dashboard/serviceprovider');
            case 'admin':
                return redirect()->intended('/dashboard/admin');
            case 'loap':
            default:
                return redirect()->intended('/dashboard/loap');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}