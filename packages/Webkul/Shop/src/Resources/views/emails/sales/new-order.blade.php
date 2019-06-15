<!DOCTYPE html>

<html>
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style type="text/css">
      table {
        margin-left: 10px;
        margin-bottom: 10px;
      }
      th, td {
        text-align: left;
        font-family:'Segoe UI';
        font-size: 10.5pt;
        color:#000000;
      }
      .footer table{
        margin-left: 0px;
      }
      .footer td {
        color:#FFFFFF;
      }
      .content tbody td {
        padding-right: 20px;
      }
      @media only screen and (max-width: 480px){
        .columnContainer{
          display:block !important;
          width:100% !important;
        }
      }
    </style>

  </head>

  <body style='margin:0;padding:0;'>
    <table>
      <tr>
        <td align="left" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
          <img src="{{ asset(\App\MailSetting::first()->logo) }}" alt="" title="" height='50px' style="margin:5px;">
        </td>
      </tr>
    </table>

    <table>
      <tr>
        <td align="center" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
          <div class="C752d718b4c914b32aa8a5857807b2c77" style="padding:5px;">
            <div style="text-align:left;">
              <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">Hello {{core()->getCurrentChannel()->name}},<br>
              A new order has been placed by {{ $order->customer_full_name }}.<br>
            </div>
          </div>
          <div class="Cd70d9736a8d8451fb4275c2e239f1531" style="padding:5px;">
            <div style="text-align:left;">
              <a href="{{ route('admin.sales.orders.view', $order->id) }}" style="font-family:'Segoe UI'; font-size: 10.5pt;color:#4362CA;">View Complete Order Details</a>
            </div>
          </div>
        </td>
      </tr>
    </table>

    <div class="content">
      <table>
        <tr>
          <th>
            <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;"><b>SUMMARY OF ORDER<br>
          </th>
        </tr>
      </table>

      @foreach ($order->items as $item)
        <table>
          <thead>
            <tr>
              <th colspan="2">
                <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;"><b>{{ $item->name }}<br></span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Quantity</td>
              <td><b>{{ $item->qty_ordered }}</b></td>
            </tr>
            <tr>
              <td>Price </td>
              <td><b>{{ core()->formatPrice($item->price, $order->order_currency_code) }}</b></td>
            </tr>
          </tbody>
        </table>
      @endforeach
    </div>

    <table>
      <thead>
        <tr>
          <th>Payment Method</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            {{ core()->getConfigData('payment.paymentmethods.' . $order->payment->method . '.title') }}
          </td>
        </tr>
      </tbody>
    </table>

    <table>
      <thead>
        <tr>
          <th>
            Shipping Address
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $order->shipping_address->name }}</td>
        </tr>
        <tr>
          <td>
            {{ $order->shipping_address->address1 }}, {{ $order->shipping_address->state }}
          </td>
        </tr>
        <tr>
          <td>{{ country()->name($order->shipping_address->country) }}, {{ $order->shipping_address->postcode }}</td>
        </tr>
      </tbody>
    </table>

    <table>
      <thead>
        <tr>
          <th colspan="2">
            Shipping Location
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="2">
            $order->shipping_title
          </td>
        </tr>
        <tr>
          <td>Mobile:</td>
          <td><b>{{ $order->shipping_address->phone }} </b></td>
        </tr>
      </tbody>
    </table>

    <div class="footer">
      <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="background-color:#4362CA;padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
          <td width="120px" style="color: #FFFFFF">Subtotal</td>
          <td style="color: #FFFFFF">{{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}</td>
        </tr>
        <tr>
          <td width="120px" style="color: #FFFFFF">Shipping</td>
          <td style="color: #FFFFFF">{{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}</td>
        </tr>
        <tr>
          <td width="120px" style="color: #FFFFFF">Tax</td>
          <td style="color: #FFFFFF">{{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}</td>
        </tr>
        <tr>
          <td width="120px" style="color: #FFFFFF"><b>Grand Total</b></td>
          <td style="color: #FFFFFF"><b>{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</b></td>
        </tr>
      </table>
      <div>
        <p>Your patronage is highly appreciated.</p>
        <p>
          Your order is being processed and we will send you a tracking number once your item is shipped. Disregard if you opted for in-store pick up.
          If you need further assistant or have an inquiry, please contact us at {{core()->getCurrentChannel()->phone_number}}
        </p>
        <p>Kind regards.</p>
      </div>
    </div>

  </body>
</html>