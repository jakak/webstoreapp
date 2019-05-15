<?php

namespace Webkul\Admin\Listeners;

use Illuminate\Support\Facades\Mail;
use Webkul\Admin\Mail\NewOrderNotification;
use Webkul\Admin\Mail\NewInvoiceNotification;
use Webkul\Admin\Mail\NewShipmentNotification;
use App\Mail\NewOrder;
use Webkul\Core\Models\Channel;

/**
 * Order event handler
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class Order {

    private $channel;

    function __construct()
    {
        $this->channel = Channel::first();
    }

    /**
     * @param mixed $order
     *
     * Send new order confirmation mail to the customer
     */
    public function sendNewOrderMail($order)
    {
        try {
            Mail::send(new NewOrderNotification($order));

            if ($this->channel->receives_notification) {
                // Notify store manager
                Mail::send(new NewOrder($order, $this->channel->email));
            }
        } catch (\Exception $e) {

        }
    }

    /**
     * @param mixed $invoice
     *
     * Send new invoice mail to the customer
     */
    public function sendNewInvoiceMail($invoice)
    {
        try {
            Mail::send(new NewInvoiceNotification($invoice));
        } catch (\Exception $e) {

        }
    }

    /**
     * @param mixed $shipment
     *
     * Send new shipment mail to the customer
     */
    public function sendNewShipmentMail($shipment)
    {
        try {
            Mail::send(new NewShipmentNotification($shipment));
        } catch (\Exception $e) {

        }
    }

    /**
     * @param mixed $shipment
     *
     * Send new shipment mail to the customer
     */
    public function updateProductInventory($order)
    {
    }
}