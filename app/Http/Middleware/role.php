<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class role
{
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        $user = $request->user();

        $redirects = [
            'Admin' => 'AdminDashboard',
            'Event' => 'EventDashboard',
            'User' => 'UserDashboard',
        ];

        if ($this->userHasAccess($user, $allowedRoles)) {
            return $next($request);
        }

        return redirect()->route($redirects[$user->role] ?? 'login');
    }

    private function userHasAccess($user, array $allowedRoles)
    {
        return in_array($user->role, $allowedRoles);
    }
}