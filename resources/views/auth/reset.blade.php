@extends('layouts.default')

@section('page_title')
    New Password
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-header">
                    <h1>New Password</h1>
                </div>

                <form method="POST" action="{{ url('password/reset') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        Email
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        Password
                        <input class="form-control" type="password" name="password">
                    </div>

                    <div class="form-group">
                        Confirm Password
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit">
                            Reset Password
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop