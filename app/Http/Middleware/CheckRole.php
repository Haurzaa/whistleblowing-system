<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Akses ditolak');
    }
}

