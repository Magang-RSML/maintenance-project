<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLevel
{
    public function handle(Request $request, Closure $next): Response
    {
        // Menyimpan level pengguna berdasarkan data yang ada di sesi
        if ($user = $request->user()) {
            session(['user_level' => $user->level]);
        } else {
            // Jika tidak ada pengguna yang login, atur level default
            session(['user_level' => 'employee']);
        }

        return $next($request);
    }
}
