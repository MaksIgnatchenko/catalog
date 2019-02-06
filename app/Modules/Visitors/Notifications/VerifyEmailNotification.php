<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 05.02.19
 *
 */

namespace App\Modules\Visitors\Notifications;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class VerifyEmailNotification extends VerifyEmailBase implements ShouldQueue
{
    use Queueable;

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage())
            ->view('mail.verifyEmail', ['user' => $notifiable, 'verificationUrl' => $this->verificationUrl($notifiable)]);
//            ->subject(Lang::getFromJson('Verify Email Address'))
//            ->line('<img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('img/email/logo.png')))}}' alt="">")
//            ->line('Welcome to the ' . config('app.name'))
//            ->line('Your name ' . $notifiable->name)
//            ->line('Your email ' . $notifiable->email)
//            ->line(Lang::getFromJson('Please click the button below to verify your email address.'))
//            ->action(
//                Lang::getFromJson('Verify Email Address'),
//                $this->verificationUrl($notifiable)
//            )
//            ->line(Lang::getFromJson('If you did not create an account, no further action is required.'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'visitorVerification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
        );
    }
}