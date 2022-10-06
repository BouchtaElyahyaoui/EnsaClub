<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ClubRequestAccepted extends Notification
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
        // return (new MailMessage)->markdown('mail.friendrequest.accepted', [
        //     'user' => $this->user,
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
                'message' =>   $this->club->clubName . " Has accepted your request to join their club.",
                'link' => route('clubs.show', $this->club->clubName),
                'avatar' => $clubImg,
                'sent' => Carbon::now()
            ]
        ];
    }
}
