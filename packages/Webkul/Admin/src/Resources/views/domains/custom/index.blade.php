@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.settings.domains.connect-domain') }}
@stop
@section('css')
    <style>
        .tabs {
            display: none;
        }
        label.sub-title{
            color: #8b8b8b;
            margin-left: 5px;
        }
        div.d-flex {
            display: flex;
        }
        .control-group .no-display {
            border: none;
            width:70%;
        }
        div.no-display .control {
            width: 94%;
            box-shadow: none;
            margin: 0;
            cursor: default;
        }
        div.no-display {
            background-color: #79C142;
            height: 36px;
            border-radius: 7px;
            margin-top: 10px;
            margin-bottom: 2px;
        }
        div.no-display span.copy {
            cursor: pointer;
            position: relative;
            display: inline-block;
        }
        div.no-display span.copy-tip {
            position: absolute;
            display: none;
            background-color: #c7c7c7;
            width: 70px;
            text-align: center;
            box-shadow: 0 0 10px #000;
            bottom: 55px;
            right: 30%;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <a href="{{route('admin.domains.show')}}">
                        <i class="icon angle-left-icon back-link"></i>
                    </a>
                    {{ __('admin::app.settings.domains.connect-domain') }}</h1>
            </div>
        </div>
        <div class="page-content">
            <form action="#">
                <h4>Make your store memorable with a personalized domain.</h4>
                <div class="control-group">
                    <label for="cname">CNAME</label>
                    <div class="no-display">
                        <input type="text" class="no-display control btn btn-primary" id="cname" name="cname"
                               readonly value="domain.mystore.ng">
                        <span class="fas fa-copy copy" style="color: #FFFFFF"></span>
                        <span class="copy-tip">Copied</span>
                    </div>
                    <label class="sub-title" for="cname">
                        {{ __('admin::app.settings.domains.add-cname-text') }}
                    </label>
                </div>
                <div class="control-group">
                    <label for="domain">Domain</label>
                    <div class="d-flex" style="width: 70%">
                        <input type="text" id="httpHolder" value="https://" readonly class="control"
                               style="width: 11%; border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;
                            padding-right: 0" required
                        >
                        <input type="text" id="domain" class="control" placeholder="example.com"
                               name="domain" style="border-top-left-radius: 0; border-bottom-left-radius: 0; border-left: 0;
                            width: 89%; box-shadow: none; padding-left: 0;" required
                        >
                    </div>
                    <div class="sub-title">
                        {{ __('admin::app.settings.domains.add-domain-text') }}
                    </div>
                </div>
                <div class="control-group">
                    <p>
                        Learn more about <a href="#" class="primary">Connecting a Domain</a>
                    </p>
                </div>
                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button type="submit" class="btn btn-md btn-primary">
                        {{ __('admin::app.settings.domains.verify-domain') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            document.querySelector('#domain').addEventListener('focusin', function() {
                document.querySelector('#httpHolder').style.borderColor = '#79C142';
            }, false);
            document.querySelector('#domain').addEventListener('focusout', function() {
                document.querySelector('#httpHolder').style.borderColor = '#C7C7C7';
            }, false);
          document.querySelector('#httpHolder').addEventListener('focus', function () {
            document.querySelector('#domain').focus();
          }, false);
          document.querySelector('.copy').addEventListener('click', function() {
            const cname = document.querySelector('#cname');
            cname.select();
            cname.setSelectionRange(0, 99999);
            document.execCommand("copy");

            $('.copy-tip').fadeIn(10);
            setTimeout(() => {
              $('.copy-tip').fadeOut(500);
            }, 500);
          })
        });
    </script>
@endpush

