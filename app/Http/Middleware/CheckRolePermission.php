<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRolePermission
{
    public function handle(Request $request, Closure $next, $rolesAndPermissions)
    {
        $user = $request->user();
        if(empty($user)){
             return redirect()->route('access.denied');
        }

        $rolesAndPermissions = is_array($rolesAndPermissions) ? $rolesAndPermissions : explode(',', $rolesAndPermissions);

        foreach ($rolesAndPermissions as $roleOrPermission) {
            if ($user->hasPermissionTo($roleOrPermission)) {
                return $next($request);
            }
        }
        
        return redirect()->route('access.denied');
    }
}