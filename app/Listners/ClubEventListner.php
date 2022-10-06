<?php

namespace App\Listners;

use App\Events\ClubEventEvent;
use App\Notifications\ClubEvent;
use App\Notifications\SomeonePosted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClubEventListner
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ClubEventEvent  $event
     * @return void
     */
    public function handle(ClubEventEvent $event)
    {
        $event->user->notify(new ClubEvent($event->club));
    }
}
