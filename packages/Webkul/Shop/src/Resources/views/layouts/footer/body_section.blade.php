@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.body-section') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.body-section') }}</h1>
            </div>

        </div>
        <div class="page-content">
            <form action="{{ route('admin.themes.store') }}" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    @csrf
                    <accordian :title="'Body Content'" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label for="home_page_content">{{ __('admin::app.settings.channels.home_page_content') }}</label>
                                <textarea class="control" id="home_page_content" name="home_page_content">{{ old('home_page_content') ?: $channel->home_page_content }}</textarea>
                            </div>
                        </div>
                    </accordian>
                </div>
                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button onclick="document.querySelector('#submit').click()" class="btn btn-md btn-primary">
                        Save
                    </button>
                </div>
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
                width: "70%",
                plugins: 'image imagetools media wordcount save fullscreen code link',
                toolbar1: 'formatselect | bold italic underline  link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent ',
                image_advtab: true,
                valid_elements : '*[*]'
            });
        });
    </script>
@endpush
