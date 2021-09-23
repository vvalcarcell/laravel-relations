@extends('templates.structure')

@section('content')

<div class="container">

    <div class="card">
        <img class="card-img-top" src="{{ $article->picture }}" alt="article image">
        <div class="card-body">
            <h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
            <p class="card-text">Un articolo di: {{ $article->author->name }}</p>
            <p class="card-text">Genere: {{ $article->genere }}</p>
            <p class="card-text">{{ $article->main }}</p>
        </div>
    </div>

</div>

@endsection