<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticatedAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->guest()) {
            return redirect()->route('admin.login-admin');
        }

        return $next($request);
    }
}
