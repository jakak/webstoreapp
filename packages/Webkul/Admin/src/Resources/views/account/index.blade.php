@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.account.title') }}
@stop

@section('content-wrapper')
    <div class="inner-section">

        @include ('admin::account.side-bar')

        <div class="content-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            My Account
                        </h1>
                        <p>
                            Manage account profile
                        </p>
                    </div>

                    <div class="page-action">
                        <a href="{{ route('admin.account.edit') }}" class="btn btn-md btn-primary">
                            Manage Profile
                        </a>
                    </div>
                </div>
                <div class="table">
                    <div class="grid-container">
                        <table class="table">
                            <thead>
                                <tr style="height: 50px;">
                                    <th>
                                        Account Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
