@extends('layouts.backend')

@section('page_title')
    Create Callout
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>Create new Callout</h4>
        </div>

        <div class="row">
            {!! Form::open(array('route' => array('backend.callouts.store'), 'method' => 'POST')) !!}
            <div class="col-md-6">
                <div class="form-group">
                    <strong>{!! Form::label('title', 'Title') !!}</strong>
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <strong>{!! Form::label('description', 'Description') !!} <small>(Markdown supported)</small></strong>
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <strong>{!! Form::label('url', 'Url') !!}</strong>
                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create Callout', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                </div>
            </div>

            <div class="col-md-6">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop