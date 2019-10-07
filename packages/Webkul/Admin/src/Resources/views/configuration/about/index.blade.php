<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h1>
                About
            </h1>
        </div>

    </div>
</div>
<form method="POST" action="{{ route('admin.configuration.footer.content.create') }}">
    <div class="page-content">
        <div class="form-container">
            @csrf
            <input type="hidden" class="control" id="static_url" name="name" value="{{ old('name') ?: "about" }}" data-vv-as="state">
            <div class="control-group text" :class="">
                <label for="page_url">
                    <strong>Page URL &mdash; </strong><span class="static_page_url"></span>
                </label>
                <input readonly type="hidden" v-validate="'required'" class="control static_page_url" id="page_link" name="url" value="{{ old('url')  }}" data-vv-as="state">
            </div>

            <div class="control-group">
                <label for="page_content">Page Content</label>
                <textarea class="control" id="page_content" name="page_content">
                    @foreach(Webkul\Core\Models\FooterContent::all() as $about)
                        {{ $about->name == "about" ? $about->page_content : '' }}
                    @endforeach
                </textarea>

            </div>

            {{--   Hidden Fields here--}}
            <div class="control-group text" :class="">
                <input id="meta_title" class="modify_title control" type="hidden" value="{{ 'About' }}" name="meta_title">
                <input id="dashboard_title" type="hidden" value="{{ core()->getCurrentChannel()->business_name ?? 'My Webstore Space' }}">
            </div>

            <div class="control-group text" :class="">
                <input name="meta_keywords" type="hidden" value="webstores, store, shop, refund, information" class="control">
            </div>
            <div class="control-group text" :class="">
                <input name="meta_description" type="hidden" value="Learn about our Webstore" class="control">
            </div>
            {{--  End--}}
        </div>

        <hr class="horizontal-line">
        <div class="form-bottom">
            <button type="submit" class="btn btn-md btn-primary">
                {{ __('admin::app.configuration.save-btn-title') }}
            </button>
        </div>
    </div>
</form>
