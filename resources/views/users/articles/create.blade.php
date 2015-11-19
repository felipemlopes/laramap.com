@extends('layouts.default')

@section('page_title')
    Create Article
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h3>Create Article</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['route' => 'user_articles.store', 'method' => 'post']) !!}
                <div class="form-group">
                    <strong>{!! Form::label('title', 'Title') !!}</strong>
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Content Form Input -->
                <div class="form-group">
                    <strong>{!! Form::label('content', 'Content') !!} <small>(Markdown supported)</small></strong>
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Create Article Form Input -->
                <div class="form-group">
                    {!! Form::submit('Create Article', ['class' => 'form-control btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop