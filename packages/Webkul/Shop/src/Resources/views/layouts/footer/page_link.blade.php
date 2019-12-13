<div slot="body">
        <div class="control">
            <div class="control-group">
                <label for="first_name" class="required">{{ __('admin::app.settings.footer.post') }}</label>
                <select type="text" v-validate="'required'" class="control" name="content-1">
                    {{--   Here accept None into the db in other to disable the page in the store front --}}
                    <option value="none / none / none"
                    @foreach( App\FooterPage::skip(0)->take(1)->get() as $footer) {{ $footer->name == 'none' ? "selected"  : "" }} @endforeach
                    >None</option>

                    @foreach( Webkul\Admin\Models\Blog::all() as $post)
                        @if($post->status != 'unpublished')
                            <option value="{{ $post->id  }} / {{ $post->title  }} / {{ $post->url }}"
                            @foreach( App\FooterPage::skip(0)->take(1)->get() as $footer) {{ $footer->name == $post->title ? "selected"  : "" }} @endforeach
                            >{{ $post->title  }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="control">
            <div class="control-group">
                <label for="first_name" class="required">{{ __('admin::app.settings.footer.post') }}</label>
                <select type="text" v-validate="'required'" class="control" name="content-2">
                    {{--   Here accept None into the db in other to disable the page from front store --}}
                    <option value="none / none / none"
                    @foreach( App\FooterPage::skip(1)->take(1)->get() as $footer) {{ $footer->name == 'none' ? "selected"  : "" }} @endforeach
                    >None</option>

                    @foreach(Webkul\Admin\Models\Blog::all() as $post)
                        @if($post->status != 'unpublished')
                            <option value="{{ $post->id  }} / {{ $post->title  }} / {{ $post->url }}"
                            @foreach( App\FooterPage::skip(1)->take(1)->get() as $footer) {{ $footer->name == $post->title ? "selected"  : "" }} @endforeach
                            >{{ $post->title  }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="control">
            <div class="control-group">
                <label for="first_name" class="required">{{ __('admin::app.settings.footer.post') }}</label>
                <select type="text" v-validate="'required'" class="control" name="content-3">
                    {{--   Here accept None into the db in other to disable the page from front store --}}
                    <option value="none / none / none"
                    @foreach( App\FooterPage::skip(2)->take(1)->get() as $footer) {{ $footer->name == 'none' ? "selected"  : "" }} @endforeach
                    >None</option>

                    @foreach(Webkul\Admin\Models\Blog::all() as $post)
                        @if($post->status != 'unpublished')
                            <option value="{{ $post->id  }} / {{ $post->title  }} / {{ $post->url }}"
                            @foreach( App\FooterPage::skip(2)->take(1)->get() as $footer) {{ $footer->name == $post->title ? "selected"  : "" }} @endforeach
                            >{{ $post->title  }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="control">
            <div class="control-group">
                <label for="first_name" class="required">{{ __('admin::app.settings.footer.post') }}</label>
                <select type="text" v-validate="'required'" class="control" name="content-4">
                    {{--   Here accept None into the db in other to disable the page from front store --}}
                    <option value="none / none / none"
                    @foreach( App\FooterPage::skip(3)->take(1)->get() as $footer) {{ $footer->name == 'none' ? "selected"  : "" }} @endforeach
                    >None</option>

                    @foreach(Webkul\Admin\Models\Blog::all() as $post)
                        @if($post->status != 'unpublished')
                            <option value="{{ $post->id  }} / {{ $post->title  }} / {{ $post->url }}"
                            @foreach( App\FooterPage::skip(3)->take(1)->get() as $footer) {{ $footer->name == $post->title ? "selected"  : "" }} @endforeach
                            >{{ $post->title  }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="control">
            <div class="control-group">
                <label for="first_name" class="required">{{ __('admin::app.settings.footer.post') }}</label>
                <select type="text" v-validate="'required'" class="control" name="content-5">
                    {{--   Here accept None into the db in other to disable the page from front store --}}
                    <option value="none / none / none"
                    @foreach( App\FooterPage::skip(4)->take(1)->get() as $footer) {{ $footer->name == 'none' ? "selected"  : "" }} @endforeach
                    >None</option>

                    @foreach( Webkul\Admin\Models\Blog::all() as $post)
                        {{-- If the page is not disabled, it should list it  --}}
                        @if($post->status != 'unpublished')
                            <option value="{{ $post->id  }} / {{ $post->title  }} / {{ $post->url }}"
                            @foreach( App\FooterPage::skip(4)->take(1)->get() as $footer) {{ $footer->name == $post->title ? "selected"  : "" }} @endforeach
                            >{{ $post->title  }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

    </div>
