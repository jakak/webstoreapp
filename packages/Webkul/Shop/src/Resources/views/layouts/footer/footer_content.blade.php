@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.themes.footer') }}
@stop

@section('content')

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.settings.themes.footer') }}</h1>
            </div>

        </div>
        <div class="page-content">
            <form action="{{ route('admin.configuration.footer.pages.create') }}" enctype="multipart/form-data" method="POST">
                <div class="form-container">
                    @csrf
                    <accordian :title="'Page Links'" :active="false">
                            @include('shop::layouts.footer.page_link')
                    </accordian>

                    <accordian :title="'Social Links'" :active="true">
                            @include('shop::layouts.footer.social_link')
                    </accordian>

                    <accordian :title="'Footer Credit'" :active="false">
                            @include('shop::layouts.footer.footer_credit')
                    </accordian>
                </div>

                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button type="submit" class="btn btn-md btn-primary">
                        save
                    </button>
                </div>

            </form>
        </div>

    </div>

@endsection
