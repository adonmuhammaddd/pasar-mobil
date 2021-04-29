<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyHelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        require_once app_path() . '/Helpers/MyHelper.php';
    }

    public function boot()
    {
        //
    }
}
