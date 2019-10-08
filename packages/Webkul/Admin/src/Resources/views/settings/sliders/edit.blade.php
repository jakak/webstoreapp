@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.sliders.edit-title') }}
@stop

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('admin.sliders.update', $slider->id) }}" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('admin::app.settings.sliders.edit-title') }}
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-md btn-primary">
                        {{ __('admin::app.settings.sliders.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">

                    @csrf()

                    <div class="control-group" :class="[errors.has('title') ? 'has-error' : '']">
                        <label for="title">{{ __('admin::app.settings.sliders.title') }}</label>
                        <input type="text" class="control" name="title" v-validate="'required'" data-vv-as="&quot;{{ __('admin::app.settings.sliders.title') }}&quot;" value="{{ $slider->title ?: old('title') }}">
                        <span class="control-error" v-if="errors.has('title')">@{{ errors.first('title') }}</span>
                    </div>

                    <div class="control-group">
                        <image-wrapper
                            :button-label="'{{ __('admin::app.settings.sliders.upload-slider') }}'" input-name="image" url-transform="no-transform"
                            :multiple="false" :images='"{{ url('storage/'.$slider->path) }}"' sub-title="Recommended slider size is (1500 * 600)px"
                            size="large"
                        ></image-wrapper>
                    </div>

                    <div class="control-group">
                        <label for="content">{{ __('admin::app.settings.sliders.content') }}</label>

                        <div class="panel-body">
                            <textarea id="tiny" class="control" id="add_content" name="content" rows="5">{{ $slider->content ? : old('content') }}</textarea>
                        </div>

                        <span class="control-error" v-if="errors.has('content')">@{{ errors.first('content') }}</span>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#tiny',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
                image_advtab: true,
                templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                ],
            });
        });
    </script>
@endpush
