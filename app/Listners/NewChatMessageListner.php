<?php

namespace App\Listners;

use App\Events\NewChatMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewChatMessageListner
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
     * @param  \App\Events\NewChatMessageEvent  $event
     * @return void
     */
    public function handle(NewChatMessageEvent $event)
    {
        //
    }
}
