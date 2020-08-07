<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Truck;
use App\Observers\TruckObserver;

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
        Truck::observe(TruckObserver::class);
    }
}
