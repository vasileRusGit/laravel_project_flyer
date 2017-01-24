@extends('layout')


@section('content')

    <div class="flyers">
        @foreach($flyer->chunk(3) as $flyer)
            <div class="row">
                @foreach($flyer as $flyers)
                    <div class="col-md-4" id="articles">
                        <article class="card">
                            <header class="cardThumb">
                                <a href="/{{$flyers->zip}}/{{$flyers->street}}">
                                    @foreach($flyers->photos as $photo)
                                        <img src="/{{$photo->path}}">
                                    @endforeach
                                </a>
                            </header>
                            <div class="cardDate">
                                <span class="cardDateDay">{{ $flyers->created_at->format('d') }}</span>
                                <span class="cardDateMonth">{{ $flyers->created_at->format('M') }}</span>
                            </div>
                            <div class="cardBody">
                                <div class="cardTitle"><a
                                            href="/{{$flyers->zip}}/{{$flyers->street}}">{{ $flyers->street }}</a></div>
                                <h2 class="cardCategory">{{ $flyers->city }}</h2>
                                <div class="cardSubtitle">{{ $flyers->price }}</div>
                                <p class="cardDescription">{{ $flyers->description }}</p>
                            </div>
                            <footer class="cardFooter">
                                <span class="icon icon--time"></span>{{ $flyers->time_elapsed_string($flyers->created_at->getTimestamp()) }}
                                <span class="icoqn icon--comment"></span><a href="#">1 comments</a>
                            </footer>
                        </article>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    {{$pagination->links()}}

@stop
