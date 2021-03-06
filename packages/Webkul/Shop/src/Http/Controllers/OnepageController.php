<?php

namespace Webkul\Shop\Http\Controllers;

use Exception;
use Throwable;
use Webkul\Shop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Payment\Facades\Payment;
use Webkul\Checkout\Http\Requests\CustomerAddressForm;
use Webkul\Sales\Repositories\OrderRepository;
use App\Location;

/**
 * Checkout controller for the customer and guest for placing order
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class OnepageController extends Controller
{
    /**
     * OrderRepository object
     *
     * @var array
     */
    protected $orderRepository;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
    */
    public function index()
    {
        if (Cart::hasError())
            return redirect()->route('shop.checkout.cart.index');

        $location = Location::select('id','location', 'rate', 'description')->get();
        $cart = Cart::getCart();

        return view($this->_config['view'], compact('cart', 'location'));
    }

    /**
     * Saves customer address.
     *
     * @param CustomerAddressForm $request
     * @return Response
    */
    public function saveAddress(CustomerAddressForm $request)
    {
        if (Cart::hasError() || !Cart::saveCustomerAddress(request()->all()) || !$rates = Shipping::collectRates())
            return response()->json(['redirect_url' => route('shop.checkout.cart.index')], 403);

        Cart::collectTotals();

        return response()->json($rates);
    }

    /**
     * Saves shipping method.
     *
     * @return Response
    */
    public function saveShipping()
    {
        $shippingMethod = request()->get('shipping_method');

        if (Cart::hasError() || !$shippingMethod || !Cart::saveShippingMethod($shippingMethod))
            return response()->json(['redirect_url' => route('shop.checkout.cart.index')], 403);

        Cart::collectTotals();

        return response()->json(Payment::getSupportedPaymentMethods());
    }

    /**
     * Saves payment method.
     *
     * @return Response
     * @throws Throwable
     */
    public function savePayment()
    {
        $payment = request()->get('payment');

        if (Cart::hasError() || !$payment || !Cart::savePaymentMethod($payment))
            return response()->json(['redirect_url' => route('shop.checkout.cart.index')], 403);

        $cart = Cart::getCart();

        $location = null;
        if ($cart->shipping_method !== 'free_free') {
            $location = Location::find($cart->shipping_method);
        }
        return response()->json([
                'jump_to_section' => 'review',
                'html' => view('shop::checkout.onepage.review', compact('cart', 'location'))->render()
            ]);
    }

    /**
     * Saves order.
     *
     * @return Response
     * @throws Exception
     */
    public function saveOrder()
    {
        if (Cart::hasError())
            return response()->json(['redirect_url' => route('shop.checkout.cart.index')], 403);

        Cart::collectTotals();

        $this->validateOrder();

        $cart = Cart::getCart();

        if ($redirectUrl = Payment::getRedirectUrl($cart)) {
            return response()->json([
                    'success' => true,
                    'redirect_url' => $redirectUrl
                ]);
        }

        $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        session()->flash('order', $order);

        return response()->json([
                'success' => true,
            ]);
    }

    /**
     * Order success page
     *
     * @return Response
    */
    public function success()
    {
        if (! $order = session('order'))
            return redirect()->route('shop.checkout.cart.index');

        return view($this->_config['view'], compact('order'));
    }

    /**
     * Validate order before creation
     *
     * @throws Exception
     */
    public function validateOrder()
    {
        $cart = Cart::getCart();

        if (! $cart->shipping_address) {
            throw new Exception(trans('Please check shipping address.'));
        }

        if (! $cart->billing_address) {
            throw new Exception(trans('Please check billing address.'));
        }

        if (! $cart->selected_shipping_rate && is_null(Location::find($cart->shipping_method))) {
            throw new Exception(trans('Please specify shipping method.'));
        }

        if (! $cart->payment) {
            throw new Exception(trans('Please specify payment method.'));
        }
    }
}
