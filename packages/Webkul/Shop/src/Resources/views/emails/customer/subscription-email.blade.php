<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en-us">
    <head>
        <meta charset="UTF-8"  content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <style type="text/css">
            table {
                margin-left: 10px;
                margin-bottom: 10px;
            }
            th, td {
                text-align: left;
                font-family: 'Segoe UI', serif;
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
            .columnContainer {
                display: flex;
                flex-direction: column;
                justify-content: center;
                width:  70%;
                margin-left: 20px;
            }
            .card {
                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid rgba(0,0,0,.125);
                border-radius: .25rem;
            }
            .card-body {
                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: 1.25rem;
            }
            .card-footer {
                padding: .75rem 1.25rem;
                background-color: #AAAAAA;
                border-top: 1px solid rgba(0,0,0,.125);
                border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
            }
        </style>
        <title></title>
    </head>

    <body style='margin:0;padding:0;' class="columnContainer">
        <img src="{{ asset(\App\MailSetting::first()->logo, 'storage') }}" alt="" height='50px' style="margin:5px;">

        <div class="card text-left">
            <div class="card-body">
                <h3>Hello,</h3>
                Thank you for subscribing to our newsletter.
                You'll henceforth {{\Webkul\Core\Models\Channel::first()->name}} newsletters in your email {{ $subscriptionData['email'] }}
            </div>
            <div class="card-footer" style="color: white; text-align: center">
                &#169; {{ date("Y") }} {{\Webkul\Core\Models\Channel::first()->name}}
            </div>
        </div>

        <div style="text-align: center">
            <a style="color: #CFE498" href="{{ route('shop.unsubscribe', $subscriptionData['token']) }}">Unsubscribe</a> | Report Abuse
        </div>
    </body>
</html>
