<?php

namespace Webkul\Payment;

use Illuminate\Support\Facades\Config;
use Throwable;
use Webkul\Checkout\Facades\Cart;

class Payment
{

    /**
     * Returns all supported payment methods
     *
     * @return array
     * @throws Throwable
     */
    public function getSupportedPaymentMethods()
    {
        $paymentMethods = [];

        $paystack = app(Config::get('paystack')['paystack_payments']['class']);

        if ($paystack->isAvailable()) {
            array_push($paymentMethods, [
                'method' => $paystack->getCode(),
                'method_title' => $paystack->getTitle(),
                'description' => $paystack->getDescription(),
                'other_details' => $paystack->getOtherDetails() ?? null
            ]);
        }

        foreach (Config::get('paymentmethods') as $paymentMethod) {
            $object = app($paymentMethod['class']);

            if ($object->isAvailable()) {
                $paymentMethods[] = [
                    'method' => $object->getCode(),
                    'method_title' => $object->getTitle(),
                    'description' => $object->getDescription(),
                    'other_details' => $object->getOtherDetails() ?? null,
                ];
            }
        }


        $cart = Cart::getCart();

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
