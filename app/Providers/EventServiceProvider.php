<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\SomeonePostedEvent::class => [
            \App\Listners\SomeonePostedListner::class,
        ],
        \App\Events\FriendRequestReceivedEvent::class => [
            \App\Listners\FriendRequestReceivedListner::class,
        ],
        \App\Events\FriendRequestAcceptedEvent::class => [
            \App\Listners\FriendRequestAcceptedListner::class,
        ],
        \App\Events\NewChatMessageEvent::class => [
            \App\Listners\NewChatMessageListner::class,
        ],
        \App\Events\ClubEventEvent::class => [
            \App\Listners\ClubEventListner::class,
        ],
        \App\Events\ClubRequestAcceptedEvent::class => [
            \App\Listners\ClubRequestAcceptedListner::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
