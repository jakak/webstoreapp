<!DOCTYPE html>

<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style type="text/css">
    @media only screen and (max-width: 480px){
    .columnContainer{
    display:block !important;
    width:100% !important;}}
    </style>

</head>

<body style='margin:0;padding:0;'>

    <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
            <td align="left" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
                <img src="{{ bagisto_asset('images/logo.png') }}" alt="" title="" width='199' height='34' style="margin:5px;">
            </td>
        </tr>
    </table>
    <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
            <td align="center" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
                <div class="C752d718b4c914b32aa8a5857807b2c77" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                            Hello {{core()->getCurrentChannel()->name}}!,<br>
                            A new order has been placed by {{ $order->customer_full_name }}.<br>
                        </span>
                    </div>
                </div>
                <div class="Cd70d9736a8d8451fb4275c2e239f1531" style="padding:5px;">
                    <div style="text-align:left;">
                        <a href="{{ route('admin.sales.orders.view', $order->id) }}" style="font-family:'Segoe UI'; font-size: 10.5pt;color:#4362CA;">
                            <b>View Complete Order Details<br></b>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
            <td align="center" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
                <div class="C5f172736873843ceb09675184496a87f" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                            <b>SUMMARY OF ORDER<br></b>
                        </span>
                    </div>
                </div>
                @foreach ($order->items as $item)
                    <div class="Cd9599da565774f09b4ed13a375d23084" style="padding:5px;">
                        <div style="text-align:left;">
                            <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                                <b>{{ $item->name }}<br></b>
                                Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $item->qty_ordered }}<br>
                                Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ core()->formatPrice($item->price, $order->order_currency_code) }}<br>
                            </span>
                        </div>
                    </div>
                @endforeach
            </td>
        </tr>
    </table>
    <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
            <td align="center" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
                <div class="C0109dadd453a49c59833c91c7326db5b" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                            <b>Payment Method<br></b>
                            {{ core()->getConfigData('payment.paymentmethods.' . $order->payment->method . '.title') }}<br>
                        </span>
                    </div>
                </div>
                <div class="C83d3864902e84affa0394a7733ad6ec2" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                            <b>Shipping Address</b><br>
                            {{ $order->shipping_address->name }}<br>
                            {{ $order->shipping_address->address1 }}, {{ $order->shipping_address->state }}<br>
                            {{ country()->name($order->shipping_address->country) }}, {{ $order->shipping_address->postcode }}<br>
                        </span>
                    </div>
                </div>
                <div class="C71cef4fe836b49be8f51d38e0d0b26ac" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                            <b>{{ $order->shipping_title }}<br></b>
                            {{-- Lagos Island - Lagos Island<br> --}}
                        </span>
                    </div>
                </div>
                <div class="C1949b5aa46e7424a9dffaf96f13ee345" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">
                            Mobile: <b>{{ $order->shipping_address->phone }} <br></b>
                        </span>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="background-color:#4362CA;padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
            <td align="center" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
                <div class="C49f22cef2e8e40dd95d5564545c85a9d" style="padding:5px;">
                    <div style="text-align:left;">
                        <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#FFFFFF;">
                            Subtotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}<br>
                            Shipping &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}<br>
                            Tax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}<br>
                            Grand Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}<br>
                        </span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

</body>
</html>