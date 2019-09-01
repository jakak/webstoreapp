<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Webkul\Core\Models\Channel;
use App\Traits\HelpsMail;

class TestNotificationMail extends Mailable
{
    use Queueable, SerializesModels, HelpsMail;

    private $channel;
    public $mailSetting;

    /**
     * Create a new message instance.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setConfig();
        $this->channel = Channel::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->mailSetting);
        return $this->from($this->channel->email, $this->channel->name)
                    ->view('mail.test');
    }
}
