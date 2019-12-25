@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.payment-method.title') }}
@stop

@section('css')
    <style>
        .modal-container {
            display: none;
            width: 580px !important;
            left: 52% !important;
            padding: 0px 10px 15px;
        }
        .right {
            float: right;
        }
    </style>
@stop

@section('content-wrapper')
    <div class="inner-section">

        @include ('admin::account.side-bar')
        <div class="content-wrapper">
            <div id="addPaymentMethod" class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            {{ __('admin::app.payment-method.title') }}
                        </h1>
                    </div>

                    <div class="page-action">
                        <button onclick="paymentModal()" class="btn btn-md btn-primary">
                            {{ __('admin::app.payment-method.add-payment') }}
                        </button>
                    </div>
                </div>

                <div class="table">
                    <div class="grid-container">
                        <table class="table">
                            <thead>
                            <tr style="height: 50px;">
                                <th>
                                    Card Info
                                </th>
                                <th>
                                    Card Holder Name
                                </th>
                                <th>
                                    Expires
                                </th>
                                <th>
                                    Currency
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ 'VISA *** *** *** 736282' }}</td>
                                <td>{{ 'John Doe' }}</td>
                                <td>{{ '04/01/2020' }}</td>
                                <td>{{ 'Naira' }}</td>
                                <td><a class="btn btn-md btn-primary" href="">Remove Card</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="paymentModal" class="modal-container">
                    <div><a class="right" href="#" onclick="paymentModal()"><i class="icon remove-icon"></i></a> <h2>Add New Card</h2></div>

                    <p>This is the payment method where your subscriptions will be deducted from. Please ensure these payment method belongs to you.</p>
                    <p>When you add new payment method, we will debit your card the sum of  ₦100 for card verification only to ensure that your card is valid.</p>

                    <a href="" class="btn btn-md btn-primary right">Add Credit/Debit Card</a>

                </div>

            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        function paymentModal() {
            var modal = document.getElementById("paymentModal");
            if (modal.style.display === "block") {
                modal.style.display = "none";
            } else {
                modal.style.display = "block";
            }
        }
    </script>
@endpush
