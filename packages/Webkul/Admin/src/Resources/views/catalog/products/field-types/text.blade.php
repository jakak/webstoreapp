<input type="{{$attribute->admin_name == 'Weight' ? 'hidden' : 'text' }}" v-validate="'{{$validations}}'" class="control" id="{{ $attribute->code }}" onchange="attribute()" name="{{ $attribute->code }}" value="{{ old($attribute->code) ?: $product[$attribute->code] }}" data-vv-as="&quot;{{ $attribute->admin_name }}&quot;" {{ $disabled ? 'disabled' : '' }} {{ in_array($attribute->code, ['sku', 'url_key']) ? 'v-slugify' : '' }}/>

@if ($attribute->admin_name == 'Weight')
    <input type="text" v-validate="'{{$validations}}'" class="control" id="{{ $attribute->code }}" name="{{ $attribute->code }}" value="{{ $product[$attribute->code] ? $product[$attribute->code] : '0.5'  }}" data-vv-as="&quot;{{ $attribute->admin_name }}&quot;" {{ $disabled ? 'disabled' : '' }} {{ in_array($attribute->code, ['sku', 'url_key']) ? 'v-slugify' : '' }}/>
@endif


@push('scripts')
    <script>
        // Auto generate slug for url using attribute name
        function attribute() {
            const name = document.getElementById("name").value;
            let changeName = name.replace(/\s+/g, '-').toLowerCase();
            document.getElementById("url_key").value = changeName;
        }
    </script>
@endpush
