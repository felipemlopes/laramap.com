@extends('layouts.default')

@section('page_title')
    Reset Password
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
                    <h1>Reset Password</h1>
                </div>

                <form method="POST" action="{{ url('password/email') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        Email
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop