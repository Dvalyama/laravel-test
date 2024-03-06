<?php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRolePermission
{
    public function handle(Request $request, Closure $next, ...$rolesAndPermissions)
    {
        $user = $request->user();

        foreach ($rolesAndPermissions as $roleOrPermission) {
            if ($user && ($user->hasRole($roleOrPermission) || $user->hasPermissionTo($roleOrPermission))) {
                return $next($request);
            }
        }

        return redirect()->route('access.denied');
    }
}
