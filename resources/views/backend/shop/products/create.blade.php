@extends('layouts.backend')

@section('page_title')
    Create Product
@stop

@section('styles')
@stop

@section('scripts')
    <script src="//cdn.ckeditor.com/4.5.3/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Create new Offer</h1>
        </div>

        <div class="row">
            {!! Form::open(array('route' => 'backend.offers.store', 'novalidate' => 'novalidate', 'files' => true)) !!}
            <div class="col-md-8">
                <!-- Title Form Input -->
                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Image Form Input -->
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>
                
                <!--  Form Description Input -->
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
                </div>

                <!--  Form Content Input -->
                <div class="form-group">
                    {!! Form::label('content', 'Content') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
                </div>

                <!-- Url Form Input -->
                <div class="form-group">
                    {!! Form::label('url', 'Url') !!}
                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Code Form Input -->
                <div class="form-group">
                    {!! Form::label('code', 'Code') !!}
                    {!! Form::text('code', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Save Offer Form Input -->
                <div class="form-group">
                    {!! Form::submit('Save Offer', ['class' => 'form-control btn btn-sm btn-primary']) !!}
                </div>
            </div>

            <div class="col-md-4">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop