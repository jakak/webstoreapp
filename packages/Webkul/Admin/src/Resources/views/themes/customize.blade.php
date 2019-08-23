@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.design') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.design') }}</h1>
            </div>

            <div class="page-action">
                <button onclick="document.querySelector('#submit').click()" class="btn btn-md btn-primary">
                    Save
                </button>
            </div>
        </div>
        <div class="page-content">
            <form action="{{ route('admin.themes.store') }}" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    @csrf
                    <accordian :title="'Logo & Favicon'" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label>{{ __('admin::app.settings.channels.logo') }}
        {{-- {{dd($channel->logo)}} --}}
                                <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="logo" :multiple="false" :images='"{{ $channel->logo_url() ? 'storage/' . $channel->logo : '' }}"' ></image-wrapper>
                            </div>
        
                            <div class="control-group">
                                <label>{{ __('admin::app.settings.channels.favicon') }}
        
                                <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="favicon" :multiple="false" :images='"{{ $channel->favicon_url() ? 'storage/' . $channel->favicon : '' }}"' ></image-wrapper>
                            </div>
                        </div>
                    </accordian>
        
                    <accordian :title="'Body Content'" :active="false">
                        <div slot="body">
                            <div class="control-group">
                                <label for="home_page_content">{{ __('admin::app.settings.channels.home_page_content') }}</label>
                                <textarea class="control" id="home_page_content" name="home_page_content">{{ old('home_page_content') ?: $channel->home_page_content }}</textarea>
                            </div>
                        </div>
                    </accordian>
        
                    <accordian :title="'Footer Content'" :active="false">
                        <div slot="body">
                            <div class="control-group">
                                <label for="footer_content">{{ __('admin::app.settings.channels.footer_content') }}</label>
                                <textarea class="control" id="footer_content" name="footer_content">{{ old('footer_content') ?: $channel->footer_content }}</textarea>
                            </div>
                            <div class="control-group">
                                <label for="footer_credit">{{ __('admin::app.settings.channels.footer_credit') }}</label>
                                <input type="text" v-validate="'required'" class="control" id="footer_credit" name="footer_credit" value="{{ old('footer_credit') ?: $channel->footer_credit }}">
                            </div>
                        </div>
                    </accordian>
                </div>
                <input type="submit" style="display: none" id="submit">
            </form>
        </div>
        
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#home_page_content,textarea#footer_content',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true,
                valid_elements : '*[*]'
            });
        });
    </script>
@endpush