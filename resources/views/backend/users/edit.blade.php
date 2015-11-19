@extends('layouts.backend')

@section('page_title')
    Edit: {{ $user->username }}
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit User: <small>{{ $user->username }}</small></h1>
        </div>

        <div class="row">
            {!! Form::model($user, array('route' => array('backend.users.update', $user->id), 'method' => 'PUT')) !!}
            <div class="col-md-6">
                <h4>Basic Information</h4>
                <hr/>
                    <!-- Name Form Input -->
                    <div class="form-group">
                        <strong>{!! Form::label('name', 'Name') !!}</strong>
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Username Form Input -->
                    <div class="form-group">
                        <strong>{!! Form::label('username', 'Username') !!}</strong>
                        {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Email Form Input -->
                    <div class="form-group">
                        <strong>{!! Form::label('email', 'Email') !!}</strong>
                        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                    </div>

                <br>
                <h4>Extended Information</h4>
                <hr/>
                    <!-- Bio Form Input -->
                    <div class="form-group">
                        <strong>{!! Form::label('bio', 'Biography') !!} <small>(Markdown supported)</small></strong>
                        {!! Form::textarea('bio', $user->bio, ['class' => 'form-control']) !!}
                    </div>

                <br>
                <h4>Social</h4>
                <hr/>
                    <!-- Github_profile Form Input -->
                    <div class="form-group">
                        {!! Form::label('github_profile', 'Github Profile') !!}
                        {!! Form::text('github_profile', $user->github_profile, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Twitter_profile Form Input -->
                    <div class="form-group">
                        {!! Form::label('twitter_profile', 'Twitter Profile') !!}
                        {!! Form::text('twitter_profile', $user->twitter_profile, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Save Changes Form Input -->
                    <div class="form-group">
                        {!! Form::submit('Save Changes', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                    </div>
            </div>

            <div class="col-md-6">
                <h4>Location:</h4>
                <!-- Location Form Input -->
                <div class="form-group">
                    {!! Form::label('location', 'Location') !!}
                    {!! Form::text('location', $user->location, ['class' => 'form-control']) !!}
                </div>

                <br>
                <h4>Status, Partner & Sponsor</h4>

                <div class="form-group">
                    {!! Form::label('is_admin', 'Administrator') !!}
                    {!! Form::select('is_admin', array('1' => 'Yes', '0' => 'No'), $user->is_admin, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_partner', 'Partner') !!}
                    {!! Form::select('is_partner', array('1' => 'Yes', '0' => 'No'), $user->is_partner, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_sponsor', 'Sponsor') !!}
                    {!! Form::select('is_sponsor', array('1' => 'Yes', '0' => 'No'), $user->is_sponsor, ['class' => 'form-control']) !!}
                </div>

                <br>
                <h4>SitePoint Ambassador</h4>

                <div class="form-group">
                    {!! Form::label('is_sitepoint', 'SitePoint Ambassador') !!}
                    {!! Form::select('is_sitepoint', array('1' => 'Yes', '0' => 'No'), $user->is_sitepoint, ['class' => 'form-control']) !!}
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop