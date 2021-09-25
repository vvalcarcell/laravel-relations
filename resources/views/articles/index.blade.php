@extends('templates.structure')

@section('content')

<div class="container">
    <div class="row">
        <h1 class="text-center">NEWSPAPER</h1>
    </div>
    <div class="row create-route"><a href="{{route('articles.create')}}">Add a new article! <i class="bi bi-brush"></i> </a></div>

    <div class="row">

        @foreach($articles as $article)
        <div class="card col-md-3 justify-content-between" style="width: 18rem;">
            <div>
                <img class="card-img-top" src="{{ $article->picture }}" alt="article image">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <div class="card-details">Un articolo di: {{ $article->author->name }}</div>
                    <div class="card-tags">
                        @foreach($article->tags as $tag)
                        <a href="/tag/{{$tag->id}}" class="badge badge-info">{{$tag->name}}</a>,
                        @endforeach
                    </div>
                    <p class="card-text">{{ $article->main }}</p>
                </div>
            </div>


            <a href="{{ route('articles.show', $article)}}">
                <button type="button" class="btn btn-primary">View more</button>
            </a>


        </div>
        @endforeach

    </div>

    <div class="d-flex justify-content-center">{{ $articles->onEachSide(2)->links() }}</div>

</div>

@endsection