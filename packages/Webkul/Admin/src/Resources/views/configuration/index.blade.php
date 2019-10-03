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
        .back-arrow {
            color: #a2a2a2;
            cursor: pointer;
            margin-right: 7px;
        }
        @if(strpos(request()->url(), 'smtp') !== false)
            .image-wrapper .image-item {
            width: 100px !important;
            height: 100px !important;
        }
        @endif
        .hr {
            background-color: #79C142;
            border: none;
            height: 2px;
        }
        .payment-footer a{
            color: #3A3A3A;
            margin-top: 7px;
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>

        @if (strpos(request()->url(), 'othermethod') !== false)
            <div class="content" id="locationPage">
                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            Manage Locations
                        </h1>
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

                    <div class="page-title modify">

                        <i class="icon angle-left-icon back-link" onclick="window.history.go(-0);"></i>


                        <h1>
                            {{ __('admin::app.configuration.title') }}
                        </h1>
                    </div>

                </div>
                <div class="page-content">
                    <div class="form-container">
                        @csrf

                        <div slot="body">
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Location
                                </label>
                                <input type="text" required v-validate="'required'" class="control" id="location" name="location" value="{{ old('location') ?: $location??null }}" data-vv-as="location">
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    State
                                </label>
                                <input type="text" required v-validate="'required'" class="control" id="state" name="state" value="{{ old('state') ?: $state??null }}" data-vv-as="state">
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Country
                                </label>
                                <country></country>
                            </div>
                            <div class="control-group text" :class="">

                                <label for="rate">
                                    Rate
                                </label>
                                <input type="text" required v-validate="'required'" class="control" id="rate" name="rate" value="{{ old('rate') ?: $rate??null }}" data-vv-as="rate">
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Type
                                </label>
                                <select type="text" v-validate="'required'" class="control" id="country" name="type">
                                    <option value="per order">Per Order</option>
                                    <option value="per item">Per Item</option>
                                </select>
                            </div>
                            <div class="control-group text" :class="">

                                <label for="">
                                    Description
                                </label>
                                <textarea v-validate="''" class="control" id="description" name="description" data-vv-as="'description'">{{ old('description') ?: '' }}</textarea>
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Status
                                </label>
                                <select type="text" v-validate="'required'" class="control" id="status" name="status">
                                    <option value="enabled">Enabled</option>
                                    <option value="disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
                    </div>
                </div>
            </form>
        @elseif(strpos(request()->url(), 'pages/all') !== false)
            <div class="content" id="managePagesPage">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            Manage Pages
                        </h1>
                    </div>

                    <div class="page-action">
                        <button id="addNewPage" class="btn btn-md btn-primary">
                            Add New Page
                        </button>
                    </div>
                </div>

                <div class="page-content capitalize-tr">
                    @inject('pageGrid', 'App\DataGrids\ManagePagesDataGrid')
                    {!! $pageGrid->render() !!}
                </div>
            </div>
            <form method="POST" action="{{ route('admin.configuration.pages.create') }}" class="d-none" id="createNewPage">
                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            <span class="back-arrow"><i class="fa fa-angle-left"></i></span> Page Details
                        </h1>
                    </div>

                </div>
                <div class="page-content">
                    <div class="form-container">
                        @csrf
                        <div class="control-group text" :class="">
                            <label for="page_name" class="required" >
                                Page Name
                            </label>
                            <input type="text" required v-validate="'required'" class="control" id="page_name" name="name" value="{{ old('name') ?: null }}" data-vv-as="state">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="page_url">
                                <strong>Page URL &mdash; </strong><span class="page_url"></span>
                            </label>
                            <input readonly type="hidden" v-validate="'required'" class="control" id="page_url" name="url" value="{{ old('url') ?: null }}" data-vv-as="state">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="page_status" class="required" >
                                Page Publish Status
                            </label>
                            <div>
                                <select name="status" class="control" id="page_status">
                                    <option value="Enabled">Enabled</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="page_content">Page Content</label>
                            <textarea class="control" id="page_content" name="content">{{ old('content') ?: null }}</textarea>
                        </div>
                        <div class="control-group text" :class="">
                            <label for="meta_title" class="required" >
                                Meta Title
                            </label>
                            <input id="meta_title" name="meta_title" class="control">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="meta_keywords" class="required" >
                                Meta Keywords
                            </label>
                            <input name="meta_keywords" id="meta_keywords" class="control">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="meta_description" class="required" >
                                Meta Description
                            </label>
                            <textarea name="meta_description" id="meta_description" class="control"></textarea>
                        </div>
                    </div>

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
                    </div>
                </div>
            </form>

            {{--  Loading about page   --}}
        @elseif(strpos(request()->url(), 'pages/about') !== false)
            @include('admin::configuration.about.index')

            {{--  Loading refund policy page   --}}
        @elseif(strpos(request()->url(), 'pages/refund') !== false)
            @include('admin::configuration.refund_policy.index')

            {{--  Loading return policy page   --}}
        @elseif(strpos(request()->url(), 'pages/return') !== false)
            @include('admin::configuration.return_policy.index')

            {{--  Loading privacy policy page   --}}
        @elseif(strpos(request()->url(), 'pages/privacy') !== false)
            @include('admin::configuration.privacy_policy.index')

            {{--  Loading terms of use page   --}}
        @elseif(strpos(request()->url(), 'pages/terms') !== false)
            @include('admin::configuration.terms_of_use.index')

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
                        @if(strpos(request()->url(), 'paystack'))
                            <h1>
                                Configure Paystack Keys
                            </h1>
                        @else
                            <h1>
                                {{ __('admin::app.configuration.title') }}
                            </h1>
                        @endif
                    </div>

                </div>

                <div class="page-content">
                    <div class="form-container">
                        @csrf()

                        @if ($groups = array_get($config->items, request()->route('slug') . '.children.' . request()->route('slug2') . '.children'))

                            @foreach ($groups as $key => $item)
                                @if(count($groups) === 1)
                                    @foreach ($item['fields'] as $field)
                                        @include ('admin::configuration.field-type', ['field' => $field])
                                    @endforeach
                                @else
                                    <accordian :title="'{{ __($item['name']) }}'" :active="true">
                                        <div slot="body">
                                            @foreach ($item['fields'] as $field)
                                                @include ('admin::configuration.field-type', ['field' => $field])
                                            @endforeach
                                        </div>
                                    </accordian>
                                @endif

                            @endforeach

                        @endif

                    </div>

                    @if(strpos(request()->url(), 'paystack'))
                        <footer class="payment-footer">
                            <hr class="hr">
                            <div>
                                <div>
                                    <a target="_blank" href="https://dashboard.paystack.com/#/signup">Create a Free Paystack Account</a>
                                </div>
                                <div>
                                    <a target="_blank" href="https://paystack.com/why-choose-paystack">Learn About Paystack</a>
                                </div>
                            </div>
                        </footer>
                    @endif

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
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
            });
            /*
            * @description function that sets up the page for other javascript needs:
            * edit page that doesn't need to be loaded, fetch data via ajax, etc.
            */
            function pageSetup(page, editHandler) {
                let addButton, entityCreationPage, entityPage;
                if (page === 'location') {
                    addButton = document.querySelector('#addLocation');
                    entityCreationPage = document.querySelector('#addLocationPage');
                    entityPage = document.querySelector('#locationPage');
                } else if (page === 'managePages') {
                    addButton = document.querySelector('#addNewPage');
                    entityCreationPage = document.querySelector('#createNewPage');
                    entityPage = document.querySelector('#managePagesPage');
                    document.querySelector('.page_url').innerHTML = (
                        location.origin + '/pages/' );
                }
                addButton.addEventListener('click', function addLocation (evt) {
                    entityCreationPage.classList.remove('d-none');
                    entityPage.classList.add('d-none');
                    if (initEditor) {
                        initEditor()
                    }
                });
                document.querySelectorAll('.pencil-lg-icon').forEach(btn => {
                    btn.addEventListener('click', evt => {
                        evt.preventDefault();
                        editHandler(btn.parentElement);
                    });
                });
            }

            @if(strpos(request()->url(), 'othermethod') !== false)
            function setupEditPage(url) {
                fetch('/storemanager/configuration/sales/othermethods/addlocation/'+ url.search.substring(1) + '/details')
                    .then(response => {
                        document.querySelector('.modify').querySelector('h1').innerText = "Modify Shipping Location";

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
                        inp.name = "id";
                        document.querySelector('#addLocationPage').appendChild(inp);
                        document.querySelector('#addLocation').click();
                    })
                ;
            }
            pageSetup('location', setupEditPage);
            @elseif(strpos(request()->url(), 'pages') !== false)
                String.prototype.sluggify = function() {
                return this.toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-')
                    ;
            };

            document.querySelector('#page_name').addEventListener('keyup', function(){
                document.querySelector('#page_url').value = (
                    location.origin + '/' + this.value.sluggify());
                document.querySelector('.page_url').innerHTML = (
                    location.origin + '/' + this.value.sluggify());
            });

            document.querySelector('.back-arrow').addEventListener('click', function() {
                document.querySelector('#createNewPage').classList.add('d-none');
                document.querySelector('#managePagesPage').classList.remove('d-none');
            });

            document.querySelectorAll('.capitalize-tr tr').forEach(tr => {
                const linker = tr.querySelector('td:nth-child(2)');
                if (linker) {
                    linker.style.textTransform = "lowercase"
                }
            });

            function editPage(url) {
                url = decodeURI(url.search.substring(1)).sluggify();
                fetch(`/storemanager/configuration/pages/${url}/details`)
                    .then(response => response.json())
                    .then(response => {
                        for (const key in response) {
                            if (response.hasOwnProperty(key) && key !== "id" && key !== "created_at" && key !== "updated_at") {
                                document.querySelector('[name='+key+']').value = response[key];
                                if (key === 'url') {
                                    document.querySelector('.page_url').innerHTML = response[key];
                                }
                                if (key === 'content') {
                                    document.querySelector('[name='+key+']').innerHTML = response[key];
                                    initEditor();
                                }
                                else if (key === 'status') {
                                    // TODO: Figure out how to update the select2 component.
                                }
                            }
                        }
                        const inp = document.createElement('input');
                        inp.type="hidden";
                        inp.value = response.id;
                        inp.name = "id";
                        document.querySelector('#createNewPage').appendChild(inp);
                        document.querySelector('#addNewPage').click();
                    })
                    .catch(error => {
                        console.error(error);
                    })

            }
            pageSetup('managePages', editPage);
            @endif

        });

        //  This script load the url on the pages
        let url = document.querySelector('#static_url').value;
        let page_link = document.querySelector('.static_page_url').innerHTML = (location.origin + '/' + url);
        document.querySelector('#page_link').value = page_link;

        //   Set Meta title for all pages
        const dashboard_title = document.querySelector('#dashboard_title').value;
        const meta_title = (dashboard_title + ' — ' + document.querySelector('#meta_title').value);
        let meta = document.querySelector('.modify_title').value =  meta_title;
        console.log(meta);


    </script>
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        function initEditor() {
            $(document).ready(function () {
                tinymce.init({
                    selector: 'textarea#page_content',
                    height: 200,
                    width: "100%",
                    plugins: 'image imagetools media wordcount save fullscreen code',
                    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
                    image_advtab: true,
                    valid_elements : '*[*]'
                });
            });
        }
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
