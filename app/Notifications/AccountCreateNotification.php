<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;

class AccountCreateNotification extends Notification
{
  use Queueable;
  public $user;

  /**
  * Create a new notification instance.
  *
  * @return void
  */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
  * Get the notification's delivery channels.
  *
  * @param  mixed  $notifiable
  * @return array
  */
  public function via($notifiable)
  {
    return ['mail'];
  }

  /**
  * Get the mail representation of the notification.
  *
  * @param  mixed  $notifiable
  * @return \Illuminate\Notifications\Messages\MailMessage
  */
  public function toMail($notifiable)
  {
    return (new MailMessage)
    ->greeting('Verify Email')
    ->subject('Verification Email Request From Tender')
    ->line('Please click the below link to verify your email account')
    ->action('Verify', route('userVerify', $this->user->verify_token))
    ->line('Stay with us !!');
  }

  /**
  * Get the array representation of the notification.
  *
  * @param  mixed  $notifiable
  * @return array
  */
  public function toArray($notifiable)
  {
    return [
      //
    ];
  }
}
