<?php

namespace Webkul\Customer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Webkul\Core\Models\Channel;

/**
 * Verification Mail class
 *
 * @author    Rahul Shukla <rahulshukla.symfony517@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationData;
    private $channel;

    public function __construct($verificationData) {
        $this->verificationData = $verificationData;
        $this->channel = Channel::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->channel->email, $this->channel->name)
            ->to($this->verificationData['email'])
            ->subject('Action Required: Please verify your email')
            ->view('shop::emails.customer.verification-email')->with('data', ['email' => $this->verificationData['email'], 'token' => $this->verificationData['token']]);
    }
}
