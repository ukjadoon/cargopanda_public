<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        // Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');

        // Horizon::night();
    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewHorizon', function ($user = null) {
            $password = request()->input('pass');
            
            if ($password == env('HORIZON_PASSWORD')) {
                request()->session()->put('HORIZON_PASSWORD', $password);
            }

            return env('HORIZON_PASSWORD') == request()->session()->get('HORIZON_PASSWORD', null);
            /*return in_array($user->email, [
                //
            ]);*/
        });
    }
}
