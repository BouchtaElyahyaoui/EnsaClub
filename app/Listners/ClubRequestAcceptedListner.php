<?php

namespace App\Listners;

use App\Events\ClubRequestAcceptedEvent;
use App\Notifications\ClubRequestAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClubRequestAcceptedListner
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
     * @param  \App\Events\ClubRequestAcceptedEvent  $event
     * @return void
     */
    public function handle(ClubRequestAcceptedEvent $event)
    {
        $event->user->notify(new ClubRequestAccepted($event->club));
    }
}
