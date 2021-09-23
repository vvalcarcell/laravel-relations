@extends('templates.structure')

@section('content')

<div class="container">
    <div class="row create-route"><a href="{{route('articles.create')}}">Add a new article! <i class="bi bi-brush"></i> </a></div>

    <div class="row">

        @foreach($articles as $article)
        <div class="card col-md-3" style="width: 18rem;">
            <img class="card-img-top" src="{{ $article->picture }}" alt="article image">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-details">Un articolo di: {{ $article->author->name }}</div>
                <div class="card-details">Genere: {{ $article->genere }}</div>
                <p class="card-text">{{ $article->main }}</p>
            </div>

            <a href="{{ route('articles.show', $article)}}">
                <button type="button" class="btn btn-primary">View</button>
            </a>
        </div>
        @endforeach

    </div>


</div>

@endsection