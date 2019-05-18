<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Webkul\Core\Models\Channel;

class TestNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $channel;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->channel = Channel::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->channel->email, $this->channel->name)
                    ->view('mail.test');
    }
}
