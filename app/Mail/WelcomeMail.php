<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Webkul\Core\Models\Channel;
use App\Traits\HelpsMail;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels, HelpsMail;

    public $user;
    private $channel;

    /**
     * Create a new message instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->setConfig();
        $this->user = $user;
        $this->channel = Channel::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
                    ->from($this->channel->email, $this->channel->name)
                    ->subject('Email verified - Welcome to KlingBakeShop')
                    ->view('mail.welcome');
    }
}
