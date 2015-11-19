@extends('layouts.default')

@section('page_title')
    Edit Profile
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="row">
            <div class="col-md-12">

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Basic Information</a></li>
                    <li role="presentation"><a href="#biography" aria-controls="biography" role="tab" data-toggle="tab">Biography</a></li>
                    {{--<li role="presentation"><a href="#social" aria-controls="social" role="tab" data-toggle="tab">Social</a></li>--}}
                    <li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
                </ul>

                <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane active" id="home">
                        {{--<pre>{{ json_encode($user) }}</pre>--}}

                            {!! Form::open(['action' => 'Account\ProfileController@update', 'class' => 'col-md-6', 'method' => 'patch']) !!}

                            <!-- Name Form Input -->
                            <div class="form-group">
                                <strong>{!! Form::label('name', 'Name') !!}</strong>
                                {!! Form::text('name', $currentUser->name, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Username Form Input -->
                            <div class="form-group">
                                <strong>{!! Form::label('username', 'Username') !!}</strong>
                                {!! Form::text('username', $currentUser->username, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Email Form Input -->
                            <div class="form-group">
                                <strong>{!! Form::label('email', 'Email') !!}</strong>
                                {!! Form::email('email', $currentUser->email, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Twitter_profile Form Input -->
                            <div class="form-group">
                                {!! Form::label('twitter_profile', 'Twitter Profile') !!} <strong>(Please provide a valid URL)</strong>
                                {!! Form::text('twitter_profile', $currentUser->twitter_profile, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Github_profile Form Input -->
                            <div class="form-group">
                                {!! Form::label('github_profile', 'Github Profile') !!} <strong>(Please provide a valid URL)</strong>
                                {!! Form::text('github_profile', $currentUser->github_profile, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Location Form Input -->
                            <div class="form-group">
                                {!! Form::label('location', 'Location') !!}
                                {!! Form::text('location', $currentUser->location, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Save Changes Form Input -->
                            <div class="form-group">
                                {!! Form::submit('Save Changes', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>

                    <div role="tabpanel" class="tab-pane" id="biography">
                        {!! Form::model($currentUser, ['route' => 'account.profile.update', 'class' => 'col-md-6', 'method' => 'patch'], $currentUser->id) !!}


                            <!-- Bio Form Input -->
                            <div class="form-group">
                                <strong>{!! Form::label('bio', 'Biography') !!} <small>(Markdown supported)</small></strong>
                                {!! Form::textarea('bio', $currentUser->bio, ['class' => 'form-control']) !!}
                            </div>

                            <!-- Save Changes Form Input -->
                            <div class="form-group">
                                {!! Form::submit('Save Changes', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>

                    {{--<div role="tabpanel" class="tab-pane" id="social">--}}

                    {{--</div>--}}

                    <div role="tabpanel" class="tab-pane" id="password">
                        <form class="col-md-6" action="{{ url('account/password') }}" method="post">
                            {!! csrf_field() !!}

                            <!-- Password Form Input -->
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>

                            <!-- Confirm_password Form Input -->
                            <div class="form-group">
                                {!! Form::label('confirm_password', 'Confirm password') !!}
                                {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                            </div>

                            <!-- Save Changes Form Input -->
                            <div class="form-group">
                                {!! Form::submit('Save Password', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop