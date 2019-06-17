<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

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
        <img src="{{ asset($mailSetting->logo) }}" alt="" title="" height='50px' style="margin:5px;">
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td align="center" width="100%" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;vertical-align:top;" class="columnContainer">
          <div class="C752d718b4c914b32aa8a5857807b2c77" style="padding:5px;">
            <div style="text-align:left;">
              <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;">Hello {Store Name},<br>
              A new order has been placed by {Customer Name}.<br>
            </div>
          </div>
          <div class="Cd70d9736a8d8451fb4275c2e239f1531" style="padding:5px;">
            <div style="text-align:left;">
              <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#4362CA;"><b>View Complete Order Details<br>
              </b>
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
      <table>
        <thead>
          <tr>
            <th colspan="2">
              <span style="font-family:'Segoe UI'; font-size: 10.5pt;color:#000000;"><b>Sun Screen Lotion<br></span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Quantity</td>
            <td><b>2</b></td>
          </tr>
          <tr>
            <td>Price </td>
            <td><b>NGN1,800.00</b></td>
          </tr>
        </tbody>
      </table>
      <table>
        <thead>
          <tr>
            <th colspan="2">Banana Face Cream</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Quantity</td>
            <td><b>1</b></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><b>NGN1,800.00</b></td>
          </tr>
        </tbody>
      </table>
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
            Paystack Payments
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
          <td>Mary Igbo</td>
        </tr>
        <tr>
          <td>
            Lekki phase 1 the Place , Lagos
          </td>
        </tr>
        <tr>
          <td>Nigeria, 500272</td>
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
            Lagos Island - Lagos Island
          </td>
        </tr>
        <tr>
          <td>Mobile:</td>
          <td><b>07038997093</b></td>
        </tr>
      </tbody>
    </table>

    <div class="footer">
      <table border=0 cellspacing=0 cellpadding=0 width="100%" align="center" style="background-color:#4362CA;padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;">
        <tr>
          <td width="120px" style="color: #FFFFFF">Subtotal</td>
          <td style="color: #FFFFFF">NGN3,600.00</td>
        </tr>
        <tr>
          <td width="120px" style="color: #FFFFFF">Shipping</td>
          <td style="color: #FFFFFF">NGN1,500.00</td>
        </tr>
        <tr>
          <td width="120px" style="color: #FFFFFF">Tax</td>
          <td style="color: #FFFFFF">NGN0.00</td>
        </tr>
        <tr>
          <td width="120px" style="color: #FFFFFF"><b>Grand Total</b></td>
          <td style="color: #FFFFFF"><b>NGN5,100.00</b></td>
        </tr>
        
      </table>
    </div>
  </body>
</html>