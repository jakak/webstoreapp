<?php

namespace Webkul\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Traits\HelpsMail;
use Webkul\Core\Models\Channel;

/**
 * Subscriber Mail class
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class SubscriptionEmail extends Mailable
{
    use Queueable, SerializesModels, HelpsMail;

    public $subscriptionData;
    private $channel;

    public function __construct($subscriptionData)
    {
        $this->setConfig();
        $this->subscriptionData = $subscriptionData;
        $this->channel = Channel::first();
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->subscriptionData['email'])
            ->from($this->channel->email, $this->channel->name)
            ->subject('Newsletter subscription confirmed')
            ->view('shop::emails.customer.subscription-email')->with('data', ['content' => 'You Are Subscribed', 'token' => $this->subscriptionData['token']]);
    }
}
