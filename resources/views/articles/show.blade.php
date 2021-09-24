@extends('templates.structure')

@section('content')

<div class="container">

    <div class="row">
        <div class="card" style="width: 30rem;">
            <img class="card-img-top img-show" src="{{ $article->picture }}" alt="article image">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
                <p class="card-text">Un articolo di: {{ $article->author->name }}</p>
                <p class="card-text">
                    @foreach($article->tags as $tag)
                    {{$tag->name}},
                    @endforeach
                </p>
                <p class="card-text">{{ $article->main }}</p>
            </div>
        </div>
    </div>

</div>

@endsection