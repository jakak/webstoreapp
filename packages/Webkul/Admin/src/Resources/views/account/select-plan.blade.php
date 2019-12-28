@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.select-plan.title') }}
@stop

@section('css')
@stop

@section('content-wrapper')
    <div class="inner-section">

        @include ('admin::account.side-bar')
        <div class="content-wrapper">
            <div id="subscriptionPage" class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? window.location = '{{ url('/storemanager/account/subscription') }}' :  history.go(-1) ;"></i>

                            {{ __('admin::app.select-plan.title') }}
                        </h1>
                    </div>
                </div>

                {{-- Form start --}}
                <div  id="selectPlan" class="content">
                    <form method="POST" action="" @submit.prevent="onSubmit">
                        <div class="page-content">
                            @csrf()
                            <div slot="body">

                                <div class="control-group" :class="[errors.has('type') ? 'has-error' : '']">
                                    <label for="type" class="required">{{ __('admin::app.select-plan.plan') }}</label>
                                    <select class="control" v-validate="'required'" id="plan" onchange="subscription()"  name="type"
                                            data-vv-as="&quot;{{ __('admin::app.select-plan.plan') }}&quot;"
                                    >
                                        <option value="Standard">{{ __('admin::app.select-plan.standard') }}</option>
                                        <option value="Premium">{{ __('admin::app.select-plan.premium') }}</option>
                                        <option value="Enterprise">{{ __('admin::app.select-plan.enterprise') }}</option>
                                    </select>

                                    <span class="control-error" v-if="errors.has('type')">@{{ errors.first('type') }}</span>
                                </div>

                                <div class="control-group" :class="[errors.has('type') ? 'has-error' : '']">
                                    <label for="type" class="required">{{ __('admin::app.select-plan.duration') }}</label>
                                    <select class="control" v-validate="'required'" id="duration"  name="duration"
                                            data-vv-as="&quot;{{ __('admin::app.select-plan.duration') }}&quot;"
                                    >
                                        <option value="month">₦4,000/month</option>
                                        <option value="year">₦45,000/year</option>
                                    </select>
                                    <span class="control-error" v-if="errors.has('type')">@{{ errors.first('type') }}</span>
                                </div>

                                Webstore has a wide range of pricing options. <a href="https://webstore.ng/compare-plans">Compare plans</a> to determine your preferred features
                                <hr class="horizontal-line">
                                <div class="form-bottom">
                                    <button type="submit" class="btn btn-md btn-primary">
                                        {{ __('admin::app.select-plan.make-payment') }}
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                {{-- Form close --}}

            </div>
        </div>
    </div>

@stop
@push('scripts')
    <script>

        function select()
        {
            var sel = document.getElementById('duration');
            sel.removeChild( sel.options[0] );
            sel.removeChild( sel.options[0] );
            return sel;
        }

        function subscription() {
            const value = document.getElementById("plan").value;
            if (value === 'Standard') {
                var sel = select();
                var opt1 = document.createElement('option');
                var opt2 = document.createElement('option');
                opt1.appendChild( document.createTextNode('₦4,000/month') );
                opt2.appendChild( document.createTextNode('₦45,000/year') );
                opt1.value = 'month';
                opt2.value = 'year';
                sel.appendChild(opt1);
                sel.appendChild(opt2);
            } else if (value === 'Premium') {
                var sel = select();
                var opt1 = document.createElement('option');
                var opt2 = document.createElement('option');
                opt1.appendChild( document.createTextNode('₦7,500/month') );
                opt2.appendChild( document.createTextNode('₦85,500/year') );
                opt1.value = 'month';
                opt2.value = 'year';
                sel.appendChild(opt1);
                sel.appendChild(opt2);
            } else if (value === 'Enterprise') {
                var sel = select();
                var opt1 = document.createElement('option');
                var opt2 = document.createElement('option');
                opt1.appendChild( document.createTextNode('₦180,000/setup') );
                opt2.appendChild( document.createTextNode('₦36,000/annual renewal') );
                opt1.value = 'setup';
                opt2.value = 'renewal';
                sel.appendChild(opt1);
                sel.appendChild(opt2);
            }
        }
    </script>
@endpush
