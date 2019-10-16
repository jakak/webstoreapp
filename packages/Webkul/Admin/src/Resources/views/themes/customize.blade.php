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
        </div>
        <h3>Default Theme</h3>
        <div class="page-content">
            <form action="{{ route('admin.themes.store') }}" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    @csrf
                    <accordian :title="'Logo & Favicon'" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label>{{ __('admin::app.settings.channels.logo') }}

                                    <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="logo" :multiple="false" :images='"{{ $channel->logo_url() ? 'storage/' . $channel->logo : '' }}"' ></image-wrapper>
                            </div>

                            <div class="control-group">
                                <label>{{ __('admin::app.settings.channels.favicon') }}

                                    <image-wrapper :button-label="'{{ __('admin::app.catalog.products.add-image-btn-title') }}'" input-name="favicon" :multiple="false" :images='"{{ $channel->favicon_url() ? 'storage/' . $channel->favicon : '' }}"' ></image-wrapper>
                            </div>
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
