@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.appearance') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.appearance') }}</h1>
            </div>
        </div>
        <div class="page-content">
            <form id="my_form" action="{{ route('admin.themes.store') }}" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    @csrf
                    <accordian :title="'Storefront Logo & Favicon'" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label>{{ __('admin::app.settings.channels.storefront_logo') }}

                                    <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="logo" :multiple="false" :images='"{{ $channel->logo_url() ? 'storage/' . $channel->logo : '../themes/default/assets/images/logo.svg' }}"'  size="min-small" ></image-wrapper>
                            </div>

                            <div class="control-group">
                                <label>{{ __('admin::app.settings.channels.favicon') }}

                                    <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="favicon" :multiple="false" :images='"{{ $channel->favicon_url() ? 'storage/' . $channel->favicon : '../themes/default/assets/images/favicon.ico' }}"' ></image-wrapper>
                            </div>
                        </div>
                    </accordian>

                    <accordian :title="'Customize Colors'" :active="false">
                        <div slot="body">

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name">{{ __('admin::app.settings.colors.top-menu-background') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input id="myPickerId" style=""  class="jscolor control" id="first_name" name="top_menu_bg" value="{{ $color->top_menu_bg }}"/>
                                    @endforeach
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" >{{ __('admin::app.settings.colors.to-menu-text') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input  class="control jscolor" id="last_name" name="top_menu_text" value="{{ $color->top_menu_text }}" />
                                    @endforeach
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name">{{ __('admin::app.settings.colors.add-to-cart-button-background') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input  class="control jscolor" id="first_name" name="cart_button_bg" value="{{ $color->cart_button_bg }}"/>
                                    @endforeach
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" >{{ __('admin::app.settings.colors.add-to-cart-button-text') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input class="control jscolor" id="last_name" name="cart_button_text" value="{{ $color->cart_button_text }}" />
                                    @endforeach
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name">{{ __('admin::app.settings.colors.footer-background') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input  class="control jscolor" id="first_name" name="footer_bg" value="{{ $color->footer_bg }}"/>
                                    @endforeach
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" >{{ __('admin::app.settings.colors.footer-title') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input  class="control jscolor" id="last_name" name="footer_title" value="{{ $color->footer_title }}" />
                                    @endforeach
                                </div>
                            </div>

                            <div class="wrap-control">
                                <div class="control-group">
                                    <label for="first_name">{{ __('admin::app.settings.colors.footer-text') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input class="control jscolor" id="first_name" name="footer_text" value="{{ $color->footer_text }}"/>
                                    @endforeach
                                </div>

                                <div class="control-group last-name">
                                    <label for="last_name" >{{ __('admin::app.settings.colors.footer-button') }}</label>
                                    @foreach(App\ColorPicker::all() as $color)
                                        <input class="control jscolor" id="last_name" name="footer_button" value="{{ $color->footer_button }}" />
                                    @endforeach
                                </div>
                            </div>

                            <div><a href="javascript:{}" onclick="document.querySelector('#restore').click(); return false;">Restore</a> Default Colors</div>
                            <input style="display: none" id="restore" type="submit" name="restore" value="restore_id">

                        </div>
                    </accordian>
                </div>
                <input type="submit" style="display: none" id="submit">
            </form>
        </div>
        <hr class="horizontal-line">
        <div class="form-bottom">
            <button onclick="document.querySelector('#submit').click()" class="btn btn-md btn-primary">
                Save
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/jscolor.js') }}"></script>
    <script>
        $(document).ready(function() {
            jscolor.installByClassName("jscolor");
        });
    </script>
@endpush
