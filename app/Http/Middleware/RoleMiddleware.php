<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Normalize roles to lowercase for comparison
        $requiredRoles = array_map(fn($r) => strtolower($r), $roles);
        $currentRole = strtolower($user->role);

        // Check if user has one of the required roles
        if (!in_array($currentRole, $requiredRoles, true)) {
            abort(403, 'Unauthorized access. Required role: ' . implode(',', $roles));
        }

        return $next($request);
    }
}
