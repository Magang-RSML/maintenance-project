<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware lainnya
        \App\Http\Middleware\UserLevel::class,
    ];
}
