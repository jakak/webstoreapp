@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.subscription.title') }}
@stop

@section('css')
    <style>
        .hr-shadow {
            border:none;
            width: 100%;
            height: 50px;
            border-bottom: 1px solid #fff;
            box-shadow: 0 10px 20px -20px #333;
            margin: -60px auto 0px;
        }
    </style>
@stop

@section('content-wrapper')
    <div class="inner-section">

        @include ('admin::account.side-bar')
        <div class="content-wrapper">
            <div id="subscriptionPage" class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            {{ __('admin::app.subscription.title') }}
                        </h1>
                        <p>
                            {{ __('admin::app.subscription.billing') }}
                        </p>
                    </div>

                    <div class="page-action">
                        <a href="{{ route('admin.account.payment-method') }}" class="btn btn-md btn-primary">
                            {{ __('admin::app.subscription.payment-method') }}
                        </a>
                    </div>
                </div>

                <h2><p>You have 14 days left in your trial</p></h2>
                <p>Scale your Webstore your way - no hidden fees</p>
                <hr class="horizontal-line">
                <p>Your subscriptions are renewed using your active payment method. <a href="">Learn more</a> </p>
                <div class="table">
                    <div class="grid-container">
                        <table class="table">
                            <thead>
                            <tr style="height: 50px;">
                                <th>
                                    Subscription Plan
                                </th>
                                <th>
                                    Trial Start
                                </th>
                                <th>
                                    Trial Ends
                                </th>
                                <th>
                                    Next Billing
                                </th>
                                <th>
                                    Payment Method
                                </th>
                                <th>
                                    Amount
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ 'Standard - 30 days' }}</td>
                                <td>{{ '22/12/2019' }}</td>
                                <td>{{ '04/01/2020' }}</td>
                                <td>{{ 'Jan 04, 2020' }}</td>
                                <td>{{ 'VISA **** **** **** 4105' }}</td>
                                <td>{{ 'Free Trial' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr class="hr-shadow">
                <p><a href="" >Switch Plans</a> | <a href=""> Cancel Plan</a></p>

                <hr class="horizontal-line">

                <div style="margin-bottom: 80px">
                    <img  src="https://res.cloudinary.com/webstore-cloud/image/upload/c_scale,w_250/v1567929421/Paystack/paystack-badge-cards_nji4dn.png">
                    <a onclick="subscription()" style="float: right;" href="{{ route('admin.account.select-plan') }}" class="btn btn-md btn-primary">
                        {{ __('admin::app.subscription.subscribe') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        function subscription() {
            var subscription = document.getElementById("subscriptionPage");
            if (subscription.style.display === "none") {
                subscription.style.display = "block";
            }  else {
                subscription.style.display = "none";
                document.getElementById("selectPlan").style.display = "block";
            }
        }
    </script>
@endpush
