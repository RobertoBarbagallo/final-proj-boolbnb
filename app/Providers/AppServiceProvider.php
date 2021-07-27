<?php

namespace App\Providers;

use Braintree;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    //     $gateway = new \Braintree\Gateway ([
            
    // "environment" => "sandbox",
    // "merchantID" => "7m2b5378qw2dvhx6",
    // "publicKey" =>"3vg9vpkxr6dzbhs2",
    // "privateKey" => "c7f677ef40f33b16a02b8ad375a32480",
    //     ]);
    }
}
