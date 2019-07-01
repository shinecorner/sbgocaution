<?php

namespace App\Notifications\landlord;
use LaravelLocalization;
use Illuminate\Notifications\Messages\MailMessage;


class ResetPasswordNotification extends \Illuminate\Auth\Notifications\ResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       // dd(config('mail'));
        // echo LaravelLocalization::getURLFromRouteNameTranslated(\Session::get('locale'),'routes.PASSWORD_RESET').'/'.$this->token; die();
        return (new MailMessage)
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', url(LaravelLocalization::getURLFromRouteNameTranslated(\Session::get('locale'),'landlord/login.routes.PASSWORD_RESET')).'/'.$this->token )
            ->line('If you did not request a password reset, no further action is required.');
    }
}
