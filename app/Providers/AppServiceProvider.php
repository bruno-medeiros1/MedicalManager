<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Specified key was too long error, Laravel News post:
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        //
    }
}
