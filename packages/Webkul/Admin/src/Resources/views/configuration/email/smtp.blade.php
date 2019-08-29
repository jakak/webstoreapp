@section('css')
<style>

    body {
        background-color: red;
    }
</style>

@endsection
<div class="content">
    <form action="{{ route('admin.configuration.email') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="page-header">
            <div class="page-title">
                <h1>
                    SMTP Protocol
                </h1>
            </div>

            <div class="page-action">
                <button class="btn btn-md btn-primary">
                    Save
                </button>
            </div>
        </div>

        <div class="page-content">
            <div class="control-group">
                <label>{{ __('admin::app.settings.email.logo') }}

                <image-wrapper size="small" :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'"
                               input-name="logo" :multiple="false" :images='"{{ asset($emailConfig->logo ?? '') }}"'
                               url-transform="no-transform"></image-wrapper>
            </div>

            <div class="control-group" :class="[errors.has('host') ? 'has-error' : '']">
                <label for="host" class="required">{{ __('admin::app.settings.email.host') }}</label>
                <input v-validate="'required'" class="control" id="host" name="host"
                    data-vv-as="&quot;{{ __('admin::app.settings.email.host') }}&quot;"
                    value="{{ old('host') ?: $emailConfig->host ?? '' }}" required />
                <span class="control-error" v-if="errors.has('host')">@{{ errors.first('host') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('username') ? 'has-error' : '']">
                <label for="username" class="required">{{ __('admin::app.settings.email.username') }}</label>
                <input v-validate="'required'" class="control" id="username" name="username"
                    data-vv-as="&quot;{{ __('admin::app.settings.email.username') }}&quot;"
                    value="{{ old('username') ?: $emailConfig->username ?? '' }}" disabled required />
                <span class="control-error" v-if="errors.has('username')">@{{ errors.first('username') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('encryption') ? 'has-error' : '']">
                <label for="encryption" class="required">{{ __('admin::app.settings.email.encryption') }}</label>
                <select name="encryption" class="control" id="" required>
                    @if($emailConfig)
                    <option value="TLS" {{ $emailConfig->encryption == 'TLS' ? 'selected' : '' }}>
                        TLS
                    </option>
                    <option value="SSL" {{ $emailConfig->encryption == 'SSL' ? 'selected' : '' }}>
                        SSL
                    </option>
                    @else
                        <option value="TLS" selected>
                            TLS
                        </option>
                        <option value="SSL">
                            SSL
                        </option>
                    @endif
                </select>
                <span class="control-error" v-if="errors.has('encryption')">@{{ errors.first('encryption') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('port') ? 'has-error' : '']">
                <label for="port" class="required">{{ __('admin::app.settings.email.port') }}</label>
                <input v-validate="'required'" class="control" id="port" name="port"
                    data-vv-as="&quot;{{ __('admin::app.settings.email.port') }}&quot;"
                    value="{{ old('dport') ?: $emailConfig->port ?? ''}}" required />
                <span class="control-error" v-if="errors.has('port')">@{{ errors.first('port') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password" class="required">{{ __('admin::app.settings.email.password') }}</label>
                <input type="password" v-validate="'required'" class="control" id="password" name="password"
                    data-vv-as="&quot;{{ __('admin::app.settings.email.password') }}&quot;"
                    value="{{ old('password') ?: $emailConfig->password ?? ''}}" required />
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>

        </div>
    </form>
</div>
