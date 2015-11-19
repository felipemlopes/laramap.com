@extends('layouts.default')

@section('page_title')
    Sign Up
@stop

@section('styles')

@stop

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
@stop

@section('content')
    <div class="container" ng-controller="RegisterController">
        <div class="page-header">
            <h1>Sign up <small>and become an artisan</small></h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h4>Profile Information</h4>
                <form method="POST" action="{{ url('auth/register') }}" novalidate="novalidate" ng-model="formModel">
                    {!! csrf_field() !!}
                    <div class="form-group col-md-6">
                        {!! Form::label('name', 'Name') !!}
                        <input type="text"
                               class="form-control"
                               name="name"
                               ng-model="formModel.name"
                               id="name"
                               required="required" >
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('username', 'Username') !!}
                        <input type="text"
                               class="form-control"
                               name="username"
                               ng-model="formModel.username"
                               id="username"
                               required="required" >
                    </div>

                    <div class="form-group col-md-12">
                        {!! Form::label('email', 'Email') !!}
                        <input type="text"
                               class="form-control ng-pristine ng-invalid ng-invalid-required ng-valid-email"
                               ng-model="formModel.email"
                               name="email"
                               id="email"
                               required="required" >
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('password', 'Password') !!}
                        <input type="password"
                               class="form-control"
                               name="password"
                               ng-model="formModel.password"
                               id="password"
                               required="required"
                               ng-minlength="8">
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                        <input type="password"
                               class="form-control"
                               name="password_confirmation"
                               ng-model="formModel.password_confirmation"
                               id="password"
                               required="required"
                               ng-minlength="8">
                    </div>

                    <div class="form-group col-md-12">
                        {!! Form::label('location', 'Location') !!} <small>(City, Country)</small>
                        <input type="text" name="location" id="location" class="form-control" g-places-autocomplete ng-model="place" required="required">
                    </div>


                    <div class="form-group col-md-12">
                        <hr/>
                        <button class="btn btn-sm btn-default" type="submit">Register</button>
                        <a href="{{ url('auth/github') }}" class="btn btn-sm btn-social btn-github">
                            <i class="fa fa-github"></i>
                            Sign up with GitHub
                        </a>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <h4>Terms and Conditions</h4>
                <p>
                    By clicking on "Register" you agree to Laramap Terms and Conditions
                </p>
                <p>
                    But there are just some standard rules.. Don´t bother anyone else!
                </p>

                <div class="col-md-12 alert alert-success" role="alert">
                    <p>Have a Laravel-Job to offer? Take a look at <a href="https://larajobs.com/?partner=499">Larajobs</a>!</p>
                </div>

                <hr>
                <div class="col-md-4">
                    <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=laramapcom" id="_carbonads_js"></script>
                </div>
            </div>
        </div>
    </div>
@stop