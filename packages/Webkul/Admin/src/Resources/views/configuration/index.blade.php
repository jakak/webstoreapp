@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.configuration.title') }}
@stop

@section('css')
    <style>
        .d-none {
            display: none;
        }
        .capitalize-tr tr {
            text-transform: capitalize;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>
        {{-- {{ dd(request()->url()) }} --}}
        @if (strpos(request()->url(), 'othermethod') !== false)
            <div class="content" id="locationPage">
                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            Location
                        </h1>

                        <div class="control-group">
                            <select class="control" id="locale-switcher" name="locale">
                                @foreach (core()->getAllLocales() as $localeModel)

                                    <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                        {{ $localeModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="page-action">
                        <button id="addLocation" class="btn btn-md btn-primary">
                            Add Location
                        </button>
                    </div>
                </div>

                <div class="page-content capitalize-tr">
                    @inject('locationGrid', 'App\DataGrids\ShippingLocationDataGrid')
                    {!! $locationGrid->render() !!}
                </div>
            </div>
            <form method="POST" action="{{ route('admin.configuration.location') }}" class="d-none" id="addLocationPage">
                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            {{ __('admin::app.configuration.title') }}
                        </h1>

                        <div class="control-group">
                            <select class="control" id="locale-switcher" name="locale">
                                @foreach (core()->getAllLocales() as $localeModel)

                                    <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                        {{ $localeModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="page-action">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
                    </div>
                </div>
                <div class="page-content">
                    <div class="form-container">
                        @csrf
                        <accordian :title="'New Shipping Location'" :active="true">
                            <div slot="body">
                                <div class="control-group text" :class="">

                                    <label for="" class="required" >
                                        Location
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <input type="text" required v-validate="'required'" class="control" id="location" name="location" value="{{ old('location') ?: $location??null }}" data-vv-as="location">
                                </div>
                                <div class="control-group text" :class="">

                                    <label for="" class="required" >
                                        State
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <input type="text" required v-validate="'required'" class="control" id="state" name="state" value="{{ old('state') ?: $state??null }}" data-vv-as="state">
                                </div>
                                <div class="control-group text" :class="">

                                    <label for="" class="required" >
                                        Country
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <country></country>
                                </div>
                                <div class="control-group text" :class="">

                                    <label for="rate">
                                        Rate
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <input type="text" required v-validate="'required'" class="control" id="rate" name="rate" value="{{ old('rate') ?: $rate??null }}" data-vv-as="rate">
                                </div>
                                <div class="control-group text" :class="">

                                    <label for="" class="required" >
                                        Type
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <select type="text" v-validate="'required'" class="control" id="country" name="type">
                                        <option value="per order">Per Order</option>
                                        <option value="per item">Per Item</option>
                                    </select>
                                </div>
                                <div class="control-group text" :class="">

                                    <label for="">
                                        Description
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <textarea v-validate="''" class="control" id="description" name="description" data-vv-as="'description'">{{ old('description') ?: '' }}</textarea>
                                </div>
                                <div class="control-group text" :class="">

                                    <label for="" class="required" >
                                        Status
                                        <span class="locale">[{{ $channel . '-' . $locale }}]</span>
                                    </label>
                                    <select type="text" v-validate="'required'" class="control" id="status" name="status">
                                        <option value="enabled">Enabled</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </accordian>
                    </div>
                </div>
            </form>
            <script>
                function locationPageSetup() {
                    console.log(document.querySelector('#addLocation'));
                    document.querySelector('#addLocation').addEventListener('click', function addLocation (evt) {
                        document.querySelector('#addLocationPage').classList.remove('d-none');
                        document.querySelector('#locationPage').classList.add('d-none');
                    });

                    document.querySelectorAll('.pencil-lg-icon').forEach(btn => {
                        btn.addEventListener('click', evt => {
                            evt.preventDefault();

                            // Show edit page
                            setupEditPage(btn.parentElement);
                        });
                    });

                    function setupEditPage(url) {
                        fetch('/storemanager/configuration/sales/othermethods/addlocation/'+ url.search.substring(1) + '/details')
                            .then(response => {
                                return response.json();
                            })
                            .then(response => {
                                for (const key in response) {
                                    if (response.hasOwnProperty(key) && key !== "id" && key !== "created_at" && key !== "updated_at") {
                                        document.querySelector('[name='+key+']').value = response[key];
                                    }
                                }
                                const inp = document.createElement('input');
                                inp.type="hidden";
                                inp.value = response.id;
                                inp.name = "id"
                                document.querySelector('#addLocationPage').appendChild(inp);
                                document.querySelector('#addLocation').click();
                            })
                        ;

                    }
                }
            </script>
        @elseif(strpos(request()->url(), 'notifications') !== false)
            @if (strpos(request()->url(), 'smtp') !== false)
                @php
                    $emailConfig = \App\MailSetting::first();
                @endphp
                @include('admin::configuration.email.smtp')
            @else
                @include('admin::configuration.notification.create')
                @include('admin::configuration.notification.store')
                @include('admin::configuration.notification.edit')
            @endif

        @else

            <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            {{ __('admin::app.configuration.title') }}
                        </h1>

                        <div class="control-group">
                            <select class="control" id="locale-switcher" name="locale">
                                @foreach (core()->getAllLocales() as $localeModel)

                                    <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                        {{ $localeModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="page-action">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
                    </div>
                </div>

                <div class="page-content">
                    <div class="form-container">
                        @csrf()

                        @if ($groups = array_get($config->items, request()->route('slug') . '.children.' . request()->route('slug2') . '.children'))

                            @foreach ($groups as $key => $item)

                                <accordian :title="'{{ __($item['name']) }}'" :active="true">
                                    <div slot="body">

                                        @foreach ($item['fields'] as $field)

                                            @include ('admin::configuration.field-type', ['field' => $field])

                                        @endforeach

                                    </div>
                                </accordian>

                            @endforeach

                        @endif

                    </div>
                </div>

            </form>
        @endif
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#channel-switcher, #locale-switcher').on('change', function (e) {
                $('#channel-switcher').val()
                var query = '?channel=' + $('#channel-switcher').val() + '&locale=' + $('#locale-switcher').val();

                window.location.href = "{{ route('admin.configuration.index', [request()->route('slug'), request()->route('slug2')]) }}" + query;
            })
            try {
                locationPageSetup();
            } catch (error) {

            }

        });

    </script>

    <script type="text/x-template" id="country-template">

        <div>
            <select type="text" v-validate="'required'" class="control" id="country" name="country" v-model="country" data-vv-as="&quot;{{ __('admin::app.customers.customers.country') }}&quot;" @change="someHandler">
                <option value=""></option>

                @foreach (core()->countries() as $country)

                    <option value="{{ $country->name }}">{{ $country->name }}</option>

                @endforeach
            </select>
        </div>

    </script>

    <script>
        Vue.component('country', {

            template: '#country-template',

            inject: ['$validator'],

            props: ['code'],

            data: () => ({
                country: "",
            }),

            mounted() {
                this.country = this.code;
                this.someHandler()
            },

            methods: {
                someHandler() {
                    this.$root.$emit('sendCountryCode', this.country)
                },
            }
        });
    </script>

@endpush
