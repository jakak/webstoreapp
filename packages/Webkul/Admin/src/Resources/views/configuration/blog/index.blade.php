<div class="content" id="managePagesPage">
    <div class="page-header">
        <div class="page-title">
            <h1>
                Manage Blog
            </h1>
        </div>

        <div class="page-action">
            <button id="addNewPage" class="btn btn-md btn-primary">
                New Post
            </button>
        </div>
    </div>

    <div class="page-content capitalize-tr">
        @inject('postGrid', 'Webkul\Admin\DataGrids\ManagePostsDataGrid')
        {!! $postGrid->render() !!}
    </div>
</div>
<form method="POST" action="{{ route('admin.configuration.post.create') }}" class="d-none" id="createNewPage">
    <div class="page-header">

        <div class="page-title">
            <h1>
                <span class="back-arrow"><i class="fa fa-angle-left"></i></span> New Post
            </h1>
        </div>

    </div>
    <div class="page-content">
        <div class="form-container">
            @csrf
            <div class="control-group text" :class="">
                <label for="page_name" class="required" >
                    Post Title
                </label>
                <input type="text" required v-validate="'required'" class="control" id="page_name" name="title" value="{{ old('name') ?: null }}" data-vv-as="state">
            </div>
            <div class="control-group text" :class="">
                <label for="page_url">
                    <strong>Page URL &mdash; </strong><span class="page_url"></span>
                </label>
                <input readonly type="hidden" v-validate="'required'" class="control" id="page_url" name="url" value="{{ old('url') ?: null }}" data-vv-as="state">
            </div>
            <div class="control-group text" :class="">
                <label for="page_status" class="required" >
                    Post Status
                </label>
                <div>
                    <select name="status" class="control" id="page_status">
                        <option value="publish">Publish</option>
                        <option value="unpublished">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label for="page_content">Post Content</label>
                <textarea class="control" id="page_content" name="content">{{ old('content') ?: null }}</textarea>
            </div>
            <div class="control-group text" :class="">
                <label for="meta_title" class="required" >
                    Meta Title
                </label>
                <input id="meta_title" name="meta_title" class="control">
            </div>
            <div class="control-group text" :class="">
                <label for="meta_keywords" class="required" >
                    Meta Keywords
                </label>
                <input name="meta_keywords" id="meta_keywords" class="control">
            </div>
            <div class="control-group text" :class="">
                <label for="meta_description" class="required" >
                    Meta Description
                </label>
                <textarea name="meta_description" id="meta_description" class="control"></textarea>
            </div>
        </div>

        <hr class="horizontal-line">
        <div class="form-bottom">
            <button type="submit" class="btn btn-md btn-primary">
                {{ __('admin::app.configuration.save-btn-title') }}
            </button>
        </div>
    </div>
</form>


