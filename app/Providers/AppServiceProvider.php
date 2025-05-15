<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;


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
        Blade::directive('teacher', function () {
            return "<?php if (Auth::check() && trim(Auth::user()->role->name) === 'teacher'): ?>";
        });
    
        Blade::directive('endTeacher', function () {
            return "<?php endif; ?>";
        });
    }
}
