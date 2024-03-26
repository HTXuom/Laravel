<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\view\Components\Alert;
use App\view\Components\Inputs\Button;
use App\view\Components\Forms\Button as FormButton;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('env', function ($value) {
            if (config('app.env') === $value) {
                return true;
            }
            return false;
        });
        // Blade:: component ('package', Alert::class);
        // Blade::component('button', button::class);
        //  Blade::component('form-button', FormButton::class);
        Paginator::useBootstrap();    
    }
}
