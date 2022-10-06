<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ClubEvent extends Notification
{
    use Queueable;
    public $club;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($club)
    {
        $this->club = $club;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)->markdown('mail.posts.posted', [
        //     'club' => $this->club,
        // ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if (!$this->club->ClubImage || $this->club->ClubImage == 0) {
            $clubImg = '/storage/assets/images/page-img/profile-bg1.jpg';
        } else {
            $clubImg = "http://localhost:8000/storage/" . $this->club->ClubImage;
        }

        return [
            'info' => [
                'message' => $this->club->clubName . " has posted a new event .",
                'link' => route('events.index'),
                'avatar' =>  $clubImg,
                'sent' => Carbon::now(),
            ]
        ];
    }
}
