<?php

namespace Webkul\Customer\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Webkul\Core\Models\Channel;

class CustomerResetPassword extends ResetPassword
{
    private $channel;

    public function __construct($token)
    {
        parent::__construct($token);
        $this->channel = Channel::first();
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->from($this->channel->email, $this->channel->name)
            ->view('shop::emails.customer.forget-password', [
                'user_name' => $notifiable->name,
                'token' => $this->token
            ]);
    }
}
