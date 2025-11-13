<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show a simple profile photo upload page accessible to all roles.
     */
    public function photo()
    {
        $user = Auth::user();
        return view('profile.photo', compact('user'));
    }

    /**
     * Handle profile photo upload for any authenticated user.
     */
    public function updatePhoto(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'avatar' => ['required', 'image', 'max:4096'],
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('users/avatars', 'public');
            $user->avatar_path = $path;
            $user->save();
        }

        return redirect()->route('profile.photo')
            ->with('success', 'Profile photo updated');
    }
}