@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.catalog.products.edit-title') }}
@stop

@section('content')
    <div class="content">

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">

                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('admin::app.catalog.products.edit-title') }}
                    </h1>

                </div>

            </div>

            <div class="page-content">
                @csrf()

                <input name="_method" type="hidden" value="PUT">
                @if($product->attribute_family)
                    @foreach ($product->attribute_family->attribute_groups as $attributeGroup)
                        @if(($attributeGroup->name !== 'CustomAttributeGroup') && $product->type === 'simple' && in_array(strtolower($attributeGroup->name), ( new \Webkul\Attribute\Models\AttributeFamily())->getDefaultGroups()))
                            @if (count($attributeGroup->custom_attributes))
                            <accordian :title="'{{ __($attributeGroup->name) }}'" :active="true">
                                <div slot="body">

                                    @foreach ($attributeGroup->custom_attributes as $attribute)

                                        @if (! $product->super_attributes->contains($attribute))
                                            @if($product->type === 'simple' && in_array($attribute->code, $product->getDefaultAttributes()))

                                                <?php
                                                $validations = [];
                                                $disabled = false;
                                                if ($product->type == 'configurable' && in_array($attribute->code, ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to', 'width', 'height', 'depth', 'weight'])) {
                                                    if (! $attribute->is_required)
                                                        continue;

                                                    $disabled = true;
                                                } else {
                                                    if ($attribute->is_required) {
                                                        array_push($validations, 'required');
                                                    }

                                                    if ($attribute->type == 'price') {
                                                        array_push($validations, 'decimal');
                                                    }

                                                    array_push($validations, $attribute->validation);
                                                }

                                                $validations = implode('|', array_filter($validations));
                                                ?>

                                                @if (view()->exists($typeView = 'admin::catalog.products.field-types.' . $attribute->type))

                                                    @if($attribute->code !== 'visible_individually')
                                                        <div class="control-group {{ $attribute->type }}" :class="[errors.has('{{ $attribute->code }}') ? 'has-error' : '']">
                                                                <label for="{{ $attribute->code }}" {{ $attribute->is_required ? 'class=required' : '' }}>
                                                                    {{ $attribute->admin_name }}

                                                                    @if ($attribute->type == 'price')
                                                                        <span class="currency-code">({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }})</span>
                                                                    @endif
                                                                </label>


                                                                @include ($typeView)

                                                                <span class="control-error" v-if="errors.has('{{ $attribute->code }}')">@{{ errors.first('{!! $attribute->code !!}') }}</span>
                                                            </div>
                                                    @else
                                                        <input type="hidden" name="{{ $attribute->code }}" value="1">
                                                    @endif
                                            @endif
                                            @endif
                                            @if($product->type === 'configurable')
                                                    <?php
                                                    $validations = [];
                                                    $disabled = false;
                                                    if ($product->type == 'configurable' && in_array($attribute->code, ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to', 'width', 'height', 'depth', 'weight'])) {
                                                        if (! $attribute->is_required)
                                                            continue;

                                                        $disabled = true;
                                                    } else {
                                                        if ($attribute->is_required) {
                                                            array_push($validations, 'required');
                                                        }

                                                        if ($attribute->type == 'price') {
                                                            array_push($validations, 'decimal');
                                                        }

                                                        array_push($validations, $attribute->validation);
                                                    }

                                                    $validations = implode('|', array_filter($validations));
                                                    ?>

                                                @if($attribute->code !== 'visible_individually')
                                                    @if (view()->exists($typeView = 'admin::catalog.products.field-types.' . $attribute->type))

                                                        <div class="control-group {{ $attribute->type }}" :class="[errors.has('{{ $attribute->code }}') ? 'has-error' : '']">
                                                            <label for="{{ $attribute->code }}" {{ $attribute->is_required ? 'class=required' : '' }}>
                                                                {{ $attribute->admin_name }}

                                                                @if ($attribute->type == 'price')
                                                                    <span class="currency-code">({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }})</span>
                                                                @endif
                                                            </label>

                                                            @include ($typeView)

                                                            <span class="control-error" v-if="errors.has('{{ $attribute->code }}')">@{{ errors.first('{!! $attribute->code !!}') }}</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            @endif
                                        @endif

                                    @endforeach

                                </div>
                            </accordian>
                        @endif
                        @endif
                        @if(($attributeGroup->name !== 'CustomAttributeGroup') && $product->type !== 'simple')
                            @if (count($attributeGroup->custom_attributes))
                                <accordian :title="'{{ __($attributeGroup->name) }}'" :active="true">
                                    <div slot="body">

                                        @foreach ($attributeGroup->custom_attributes as $attribute)

                                            @if (! $product->super_attributes->contains($attribute))
                                                @if($product->type === 'simple' && in_array($attribute->code, $product->getDefaultAttributes()))

                                                    <?php
                                                    $validations = [];
                                                    $disabled = false;
                                                    if ($product->type == 'configurable' && in_array($attribute->code, ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to', 'width', 'height', 'depth', 'weight'])) {
                                                        if (! $attribute->is_required)
                                                            continue;

                                                        $disabled = true;
                                                    } else {
                                                        if ($attribute->is_required) {
                                                            array_push($validations, 'required');
                                                        }

                                                        if ($attribute->type == 'price') {
                                                            array_push($validations, 'decimal');
                                                        }

                                                        array_push($validations, $attribute->validation);
                                                    }

                                                    $validations = implode('|', array_filter($validations));
                                                    ?>

                                                    @if (view()->exists($typeView = 'admin::catalog.products.field-types.' . $attribute->type))

                                                        @if($attribute->code !== 'visible_individually')
                                                            <div class="control-group {{ $attribute->type }}" :class="[errors.has('{{ $attribute->code }}') ? 'has-error' : '']">
                                                                <label for="{{ $attribute->code }}" {{ $attribute->is_required ? 'class=required' : '' }}>
                                                                    {{ $attribute->admin_name }}

                                                                    @if ($attribute->type == 'price')
                                                                        <span class="currency-code">({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }})</span>
                                                                    @endif
                                                                </label>


                                                                @include ($typeView)

                                                                <span class="control-error" v-if="errors.has('{{ $attribute->code }}')">@{{ errors.first('{!! $attribute->code !!}') }}</span>
                                                            </div>
                                                        @else
                                                            <input type="hidden" name="{{ $attribute->code }}" value="1">
                                                        @endif
                                                    @endif
                                                @endif
                                                @if($product->type === 'configurable')
                                                    <?php
                                                    $validations = [];
                                                    $disabled = false;
                                                    if ($product->type == 'configurable' && in_array($attribute->code, ['price', 'cost', 'special_price', 'special_price_from', 'special_price_to', 'width', 'height', 'depth', 'weight'])) {
                                                        if (! $attribute->is_required)
                                                            continue;

                                                        $disabled = true;
                                                    } else {
                                                        if ($attribute->is_required) {
                                                            array_push($validations, 'required');
                                                        }

                                                        if ($attribute->type == 'price') {
                                                            array_push($validations, 'decimal');
                                                        }

                                                        array_push($validations, $attribute->validation);
                                                    }

                                                    $validations = implode('|', array_filter($validations));
                                                    ?>

                                                @if($attribute->code !== 'visible_individually')
                                                    @if (view()->exists($typeView = 'admin::catalog.products.field-types.' . $attribute->type))

                                                        <div class="control-group {{ $attribute->type }}" :class="[errors.has('{{ $attribute->code }}') ? 'has-error' : '']">
                                                            <label for="{{ $attribute->code }}" {{ $attribute->is_required ? 'class=required' : '' }}>
                                                                {{ $attribute->admin_name }}

                                                                @if ($attribute->type == 'price')
                                                                    <span class="currency-code">({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }})</span>
                                                                @endif
                                                            </label>

                                                            @include ($typeView)

                                                            <span class="control-error" v-if="errors.has('{{ $attribute->code }}')">@{{ errors.first('{!! $attribute->code !!}') }}</span>
                                                        </div>

                                                    @endif
                                                @endif
                                                @endif
                                            @endif

                                        @endforeach

                                    </div>
                                </accordian>
                            @endif
                        @endif
                    @endforeach
                @endif

                @if ($form_accordians)

                    @foreach ($form_accordians->items as $accordian)

                        @include ($accordian['view'])

                    @endforeach

                @endif

                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button type="submit" class="btn btn-md btn-primary">
                        {{ __('admin::app.catalog.products.save-product') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea#description',
                height: 200,
                width: "70%",
                plugins: 'image imagetools media wordcount save fullscreen code link',
                toolbar1: 'formatselect | bold italic underline  link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent ',
                image_advtab: true
            });
        });
    </script>
@endpush
