@extends('layouts.default')

@section('page_title')
    Sign in
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
                    <h1>Sign in</h1>
                </div>

            {!! Form::open(array('url' => 'auth/login', 'method' => 'post')) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div class="form-group">
                    <button class="btn btn-sm btn-default" type="submit">Login</button>
                    <a href="{{ url('auth/github') }}" class="btn btn-sm btn-social btn-github">
                        <i class="fa fa-github"></i>
                        Sign in with GitHub
                    </a>
                    <a href="{{ url('password/email') }}" class="btn btn-sm btn-primary">Forgot Password?</a>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop