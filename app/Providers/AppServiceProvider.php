<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RealRashid\SweetAlert\SweetAlertServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(SweetAlertServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
