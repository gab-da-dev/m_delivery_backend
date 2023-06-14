<?php

namespace App\Listeners;

use App\Events\DriverLocationUpdated;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\DriverLocationUpdatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDriverLocationUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DriverLocationUpdated  $event
     * @return void
     */
    public function handle(DriverLocationUpdatedEvent $event)
    {
        //
    }
}
