<?php

namespace App\Observers;

use App\Truck;
use Illuminate\Support\Str;

class TruckObserver
{
    public function creating(Truck $truck)
    {
        $truck->slug = Str::slug($truck->name);
    }

    /**
     * Handle the truck "created" event.
     *
     * @param  \App\Truck  $truck
     * @return void
     */
    public function created(Truck $truck)
    {
        //
    }

    public function updating(Truck $truck)
    {
        $truck->slug = Str::slug($truck->name);
    }

    /**
     * Handle the truck "updated" event.
     *
     * @param  \App\Truck  $truck
     * @return void
     */
    public function updated(Truck $truck)
    {
        //
    }

    /**
     * Handle the truck "deleted" event.
     *
     * @param  \App\Truck  $truck
     * @return void
     */
    public function deleted(Truck $truck)
    {
        //
    }

    /**
     * Handle the truck "restored" event.
     *
     * @param  \App\Truck  $truck
     * @return void
     */
    public function restored(Truck $truck)
    {
        //
    }

    /**
     * Handle the truck "force deleted" event.
     *
     * @param  \App\Truck  $truck
     * @return void
     */
    public function forceDeleted(Truck $truck)
    {
        //
    }
}
