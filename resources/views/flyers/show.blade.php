@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{!! $flyer->street !!}</h1>
            <h2>{!! $flyer->price !!}</h2>

            <hr>

            <div class="description">
                {!! nl2br($flyer->description) !!}
            </div>
        </div>
        <div class="col-md-8 gallery">
            @foreach($flyer->photos->chunk(4) as $set)
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3 gallery_images">
                            <img src="/{{$photo->path}}" alt="" width="250px" height="180px">
                        </div>
                    @endforeach
                </div>
            @endforeach

            @if(\Auth::check() == true)
                @if(\Auth::user()->owns($flyer))
                    <hr>
                    <form action="/{{$flyer->zip}}/{{$flyer->street}}/photos" method="post" id="addPhotoForm"
                          class="dropzone">
                        {{csrf_field()}}
                    </form>
                @endif
            @endif
        </div>
    </div>
@stop