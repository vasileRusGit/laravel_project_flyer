@extends('layout')

@section('content')
    <div class="row">
        @foreach($flyer as $flyers)
            <h2>{{ $flyers->street }}</h2>
            <h2>{{ $flyers->city }}</h2>
            <h2>{{ $flyers->zip }}</h2>
            <h2>{{ $flyers->description }}</h2>
    @endforeach
@stop