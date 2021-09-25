@extends('templates.structure')

@section('content')

<div class="container">
    <div class="row">
        <h1>{{ucwords($tag->name)}}</h1>
    </div>
    <div class="row">
        <ul class="list">
            @foreach($tag->articles as $article)
            <li>
                <a href="{{ route('articles.show', $article)}}">{{$article->title}}</a>
                <span> di {{$article->author->name}}</span>
            </li>
            @endforeach
        </ul>

    </div>

    <div class="row">
        <a href="{{ route('articles.index') }}">
            <button type="button" class="btn btn-danger">Back to Home!</button>
        </a>
    </div>

</div>

@endsection