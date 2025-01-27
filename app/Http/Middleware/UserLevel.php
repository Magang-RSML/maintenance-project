<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLevel
{
    public function handle(Request $request, Closure $next): Response
    {
       session(['user_level' => 'admin']);
       session(['user_level' => 'it_staff']);
       session(['user_level' => 'employee']);
       return $next($request);
    }
}
