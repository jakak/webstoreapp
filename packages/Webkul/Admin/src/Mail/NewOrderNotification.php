<?php

namespace Webkul\Admin\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * New Order Mail class
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class NewOrderNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * The order instance.
     *
     * @var Order
     */
    public $order;
    private $channel;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $channel)
    {
        $this->order = $order;
        $this->channel = $channel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->order->customer_email, $this->order->customer_full_name)
                    ->from($this->channel->email, $this->channel->name)
                    ->subject(trans('shop::app.mail.order.subject'))
                    ->view('shop::emails.sales.new-order');
    }
}
