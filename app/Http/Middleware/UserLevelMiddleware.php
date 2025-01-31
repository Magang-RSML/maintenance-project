<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserLevelMiddleware
{
    public function handle(Request $request, Closure $next, $level): Response
    {
        if (!Auth::check() || Auth::user()->level !== $level) {
            return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
