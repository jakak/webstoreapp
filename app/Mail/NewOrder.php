<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\StoreNotification;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    private $channel;
    private $recipients;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $channel)
    {
        $this->order = $order;
        $this->channel = $channel;
        $recipients = [];
        foreach (StoreNotification::all() as $notif) {
            if ($notif->status = 'enabled') {
                array_push($recipients);
            }
        }
        $this->recipients = $recipients;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->channel->email)
                    ->from($this->channel->email, $this->channel->name)
                    ->cc($this->recipients)
                    ->subject('New Order To Be Shipped')
                    ->view('mail.order-to-storemanager');
    }
}
