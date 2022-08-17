<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAccountInfoNotification extends Notification {
    use Queueable;

    private $name;
    private $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $data ) {
        $this->name     = $data[0];
        $this->password = $data[1];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via( $notifiable ) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable ) {
        return ( new MailMessage )
            ->line( 'Hi ' . $this->name . ', Welcome to Compet App.' )
            ->line( 'Your password is: ' . $this->password )
            ->line( 'Thank you for using our application!' );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray( $notifiable ) {
        return [
            //
        ];
    }
}