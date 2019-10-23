@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.homepage-layout') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.homepage-layout') }}</h1>
            </div>
        </div>
        <div class="page-content">

            <h4><label for="home_page_content">{{ __('admin::app.settings.channels.sections-shortcodes') }}</label></h4>

            <ul style="list-style: disc !important; margin-left: 19px; white-space: pre;">

                <li>Slider — @php echo '@'.'include("shop::home.slider")'; @endphp <span class="fas fa-copy copy" style="color: #79c142;"></span></li>

                <li>Featured Products — @php echo '@'.'include("shop::home.featured-products")' @endphp <span class="fas fa-copy copy" style="color: #79c142;"></span></li>

                <li>New Products — @php echo '@'.'include("shop::home.new-products")' @endphp <span class="fas fa-copy copy" style="color: #79c142;"></span></li>
            </ul>
            &nbsp;
            <form action="{{ route('admin.themes.store') }}" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    @csrf
                    <div slot="body">
                        <div class="control-group">
                            <label for="home_page_content">{{ __('admin::app.settings.channels.home_page_content') }}</label>
                            <textarea class="control" id="home_page_content" name="home_page_content">{{ old('home_page_content') ?: $channel->home_page_content }}</textarea>
                        </div>
                    </div>
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
