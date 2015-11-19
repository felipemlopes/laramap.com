@extends('layouts.backend')

@section('page_title')
    Bugreports
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <div class="page-header">
            <h4>{{ $reports->count() }} bugs</h4>
        </div>

        <div class="row">
            <ul>
                @foreach($reports as $report)
                    <li><a href="{{ route('backend.bugreports.show', $report->id) }}">{{ $report->created_at->diffForHumans() }}</a> by
                        <a href="mailto:{{ $report->email }}">{{ $report->email }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop