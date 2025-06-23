<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if (Schema::hasTable('settings')) {
            $settings = Setting::all()->pluck('value', 'key');
            View::share('settings', $settings);
        } else {
            View::share('settings', collect());
        }
    }
}
