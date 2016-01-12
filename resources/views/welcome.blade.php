@extends('layouts.default')

@section('page_title')
    Home
@endsection

@section('styles')

@endsection

@section('scripts')
    <script async src="//assets.helpful.io/assets/widget.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
@endsection

@section('content')
    <script type="text/javascript">
        var centreGot = true;
    </script>

    {!! $map['js'] !!}
    {!! $map['html'] !!}

    <div class="container">
        <br>
        <div class="row"></div>
    </div>

    @include('includes.partials.callout')
@endsection
