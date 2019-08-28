<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Webkul\Core\Models\Channel;

class UnsubscriptionEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    private $channel;

    /**
     * Create a new message instance.
     *
     * @param $email
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
        $this->channel = Channel::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->from($this->channel->email, $this->channel->name)
            ->subject('You have been unsubscribed')
            ->view('shop::emails.customer.unsubscription-email');
    }
}
