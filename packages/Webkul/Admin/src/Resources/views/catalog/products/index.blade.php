@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.catalog.products.title') }}
@stop

@section('content')
    <div class="content" style="height: 100%;">
        <div class="page-header">
            <div class="page-title">
                <h1>{{ __('admin::app.catalog.products.title') }}</h1>
            </div>

            <div class="page-action">
                <a href="{{ route('admin.catalog.products.create') }}" class="btn btn-md btn-primary">
                    {{ __('admin::app.catalog.products.add-product-btn-title') }}
                </a>
            </div>
        </div>

        <div class="page-content">
            {{-- @inject('product','Webkul\Admin\DataGrids\ProductDataGrid')
            {!! $product->render() !!} --}}

            @inject('products', 'Webkul\Admin\DataGrids\ProductDataGrid')
            {!! $products->render() !!}
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
          var myInt = setInterval(function() {
            if (document.querySelectorAll('tr')) {
              clearInterval(myInt);
              document.querySelectorAll('tr').forEach(tr => {
                if (tr.querySelector('td'))
                    tr.querySelector('td:nth-of-type(4)').style.textTransform = 'capitalize';
              })
            }
          }, 100);

      })
    </script>
@endpush
