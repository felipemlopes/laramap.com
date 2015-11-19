@extends('layouts.default')

@section('page_title')
    Contact
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
                    <h1>Contact</h1>
                </div>

                {!! Form::open(array('route' => 'contact.store', 'method' => 'post')) !!}
                    <!-- Name Form Input -->
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Email Form Input -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Message Form Input -->
                    <div class="form-group">
                        {!! Form::label('message', 'Message') !!}
                        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Send Message Form Input -->
                    <div class="form-group">
                       {!! Form::submit('Send Message', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop