<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;

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
        Route::middleware('web')
        ->group(function () {
            Route::get('/dashboard', function () {
                // ...
            })->middleware(['auth', 'verified']);
        });

    // ✅ Daftarkan middleware alias "admin"
        Route::aliasMiddleware('admin', RedirectIfNotAdmin::class);
    }
}
