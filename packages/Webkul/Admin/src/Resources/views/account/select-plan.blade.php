{{-- Form start --}}
<div style="display: none"  id="selectPlan" class="content">
    <form method="POST" action="" @submit.prevent="onSubmit">

        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? window.location = '{{ url('/storemanager/account/subscription') }}' :  history.go(-1) ;"></i>

                    {{ __('admin::app.select-plan.title') }}
                </h1>
            </div>


        </div>

        <div class="page-content">
            @csrf()
            <div slot="body">

                <div class="control-group" :class="[errors.has('type') ? 'has-error' : '']">
                    <label for="type" class="required">{{ __('admin::app.select-plan.plan') }}</label>
                    <select class="control" v-validate="'required'" id="type" name="type"
                            data-vv-as="&quot;{{ __('admin::app.select-plan.plan') }}&quot;"
                    >
                        <option value="standard">{{ __('admin::app.select-plan.standard') }}</option>
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
