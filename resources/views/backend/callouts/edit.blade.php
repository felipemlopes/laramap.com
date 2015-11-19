@extends('layouts.backend')

@section('page_title')
    Edit Callout: {{ $callout->title }}
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>Callout: {{ $callout->title }} <a class="btn icon-btn btn-xs btn-danger" href="{{ url('backend/callouts/delete', $callout->id) }}"><span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger"></span>Delete</a></h4>
        </div>

        <div class="row">
            {!! Form::model($callout ,array('route' => array('backend.callouts.update', $callout->id), 'method' => 'PATCH')) !!}
            <div class="col-md-6">
                <div class="form-group">
                    <strong>{!! Form::label('title', 'Title') !!}</strong>
                    {!! Form::text('title', $callout->title, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <strong>{!! Form::label('description', 'Description') !!} <small>(Markdown supported)</small></strong>
                    {!! Form::textarea('description', $callout->description, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <strong>{!! Form::label('url', 'Url') !!}</strong>
                    {!! Form::text('url', $callout->url, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save Changes', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                </div>
            </div>

            <div class="col-md-6">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop