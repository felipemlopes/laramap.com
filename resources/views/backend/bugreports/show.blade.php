@extends('layouts.backend')

@section('page_title')
    Report: #{{ $report->id }}
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>Report: #{{ $report->id }} <a class="btn icon-btn btn-xs btn-success" href="{{ url('backend/bugreports/delete', $report->id) }}"><span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-success"></span>Mark as Solved</a></h4>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5>Author: <a href="mailto:{{ $report->email }}">{{ $report->email }}</a></h5>
                <h4>Comment:</h4>
                <pre>{!! $report->comment !!}</pre>
            </div>


            @if($report->screenshot)
                <div class="col-md-12">
                    <h4>Screenshot:</h4>
                    <img src="{!! $report->screenshot !!}" alt="{{ $report->id }}" class="img-responsive">
                </div>
            @endif
        </div>
    </div>
@stop