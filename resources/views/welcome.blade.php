@extends('layouts.default')

@section('page_title')
    Home
@stop

@section('styles')

@stop

@section('scripts')
    <script async src="https://assets.helpful.io/assets/widget.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
@stop

@section('content')
    <script type="text/javascript">
        var centreGot = true;
    </script>

    {!! $map['js'] !!}
    {!! $map['html'] !!}

    {{--<div class="container">--}}
        {{--<br>--}}
        {{--<div class="row">--}}
            {{----}}
        {{--</div>--}}
    {{--</div>--}}

    @include('includes.partials.callout')
@stop