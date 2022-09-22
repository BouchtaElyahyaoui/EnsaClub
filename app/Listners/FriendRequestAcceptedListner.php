<?php

namespace App\Listners;

use App\Events\FriendRequestAcceptedEvent;
use App\Notifications\FriendRequestAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FriendRequestAcceptedListner
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
     * @param  \App\Events\FriendRequestAcceptedEvent  $event
     * @return void
     */
    public function handle(FriendRequestAcceptedEvent $event)
    {
        $event->user->notify(new FriendRequestAccepted(auth()->user()));
    }
}
