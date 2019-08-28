@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.configuration.title') }}
@stop

@section('content')
    <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>
    <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>
@endsection
