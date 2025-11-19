<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
{
    // Gunakan Bootstrap 5 untuk pagination
    Paginator::useBootstrapFive();
    
    // Force HTTPS when APP_FORCE_HTTPS is true (default: true)
    if (config('app.force_https', true)) {
        \URL::forceScheme('https');
    }
}
}
