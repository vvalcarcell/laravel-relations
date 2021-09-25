@extends('templates.structure')

@section('content')

<div class="container">

    <div class="row">

        <div class="card" style="width: 30rem;">
            <img class="card-img-top img-show" src="{{ $article->picture }}" alt="article image">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
                <p class="card-text">Un articolo di: {{ $article->author->name }}</p>
                <div class="card-text">
                    @foreach($article->tags as $tag)
                    <a href="{{route('tag.show', $tag)}}" class="badge badge-info">{{$tag->name}}</a>,
                    @endforeach
                </div>
                <p class="card-text">{{ $article->main }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('articles.index') }}">
            <button type="button" class="btn btn-danger">Go back!</button>
        </a>
    </div>

</div>

@endsection