@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.payment-method.title') }}
@stop

@section('css')
    <style>
        .modal-container {
            display: none;
            width: 580px !important;
            left: 58% !important;
            padding: 0px 15px 15px;
        }
        .right {
            float: right;
        }
        .space {
            margin-left: 9px;
        }
        .btn-outline-primary {
            background: #fff;
            color: #79c142 !important;
            border: 1px solid #79c142;
            padding: 8px 16px !important;
        }
        .btn-outline-primary:hover {
            background: #79c142;
            color: #fff !important;
            position: initial;
        }
        .md-center {
            padding-top: 13px;
        }
        img {
            float: left;
            margin-right:5px;
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
                            <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? window.location = '{{ url('/storemanager/account/subscription') }}' :  history.go(-1) ;"></i>
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
                                <td>{{ 'VISA **** **** **** 4105' }}</td>
                                <td>{{ 'John Doe' }}</td>
                                <td>{{ '04/01/2020' }}</td>
                                <td>{{ 'Naira' }}</td>
                                <td><a class="btn btn-md btn-primary" onclick="removeCardModal()" href="#">Remove Card</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Add Payment Methods modal --}}
                <div id="paymentModal" class="modal-container">
                    <div><a class="right" href="#" onclick="paymentModal()"><i class="icon remove-icon"></i></a> <h2>Add New Card</h2></div>
                    <p>Your credit or debit card will be charged for new subscriptions or to renew an existing subscription.</p>
                    <a href="" class="btn btn-md btn-primary right">Add Credit/Debit Card</a>
                </div>

                {{-- Remove Card Modal --}}
                <div id="removeCardModal" class="modal-container">
                    <div><a class="right" href="#" onclick="removeCardModal()"><i class="icon remove-icon"></i></a> <h2>Remove this payment method?</h2></div>
                    <img src="{{ URL::to('vendor/webkul/admin/assets/images/store-manager-cancel.svg') }}"> <p class="md-center">Removing it means you won't be able to use this payment method for Webstore products and services without adding it again.</p>

                    <a href="" class="btn btn-md btn-primary right space">Remove</a> &nbsp; <button  onclick="removeCardModal()" class="right btn btn-md btn-outline-primary right">Cancel</button>
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

        function removeCardModal() {
            var modal = document.getElementById("removeCardModal");
            if (modal.style.display === "block") {
                modal.style.display = "none";
            } else {
                modal.style.display = "block";
            }
        }
    </script>
@endpush
