<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserLevelService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserLevelService::class, function ($app) {
            return new UserLevelService();
        });
    }  

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
