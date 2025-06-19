<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Cargar todos los settings de la base de datos
        $settings = Setting::all()->pluck('value', 'key');

        // Compartirlos con todas las vistas Blade
        View::share('settings', $settings);
    }
}
