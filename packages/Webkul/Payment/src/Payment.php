<?php

namespace Webkul\Payment;

use Illuminate\Support\Facades\Config;
use Webkul\Checkout\Facades\Cart;

class Payment
{

    /**
     * Returns all supported payment methods
     *
     * @return array
     */
    public function getSupportedPaymentMethods()
    {
        $paymentMethods = [];

        foreach (Config::get('paymentmethods') as $paymentMethod) {
            $object = app($paymentMethod['class']);

            if ($object->isAvailable()) {
                $paymentMethods[] = [
                    'method' => $object->getCode(),
                    'method_title' => $object->getTitle(),
                    'description' => $object->getDescription(),
                ];
            }
        }
        $cart = Cart::getCart();
        $paystack_key = core()->getConfigData('sales.paymentmethods.paystack_payments.public_key');
        // return $cart;
        $data = [
            'paymentMethods'    => $paymentMethods,
            'cart'              => [
                'customer_email' => $cart->customer_email,
                'customer_name'  => $cart->customer_name,
            ],
        ];
        
        return [
                'jump_to_section' => 'payment',
                'html' => view('shop::checkout.onepage.payment', $data)->render()
            ];
    }

    /**
     * Returns payment redirect url if have any
     *
     * @return array
     */
    public function getRedirectUrl($cart)
    {
        $payment = app(Config::get('paymentmethods.' . $cart->payment->method . '.class'));

        return $payment->getRedirectUrl();
    }
}