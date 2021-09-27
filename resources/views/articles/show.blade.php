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

                <!-- <div class="comments-box">
                    @foreach($article->comments as $comment)
                    <h5>I commenti lasciati dai nostri utenti</h5>
                    <div class="single-comment">
                        <div>User</div>
                        <div>{{$comment->text}}</div>
                    </div>
                    @endforeach
                </div>  -->

                <h5>I commenti lasciati dai nostri utenti:</h5>

                @foreach ($article->comments as $comment)
                <div class="card">
                    <div class="card-header">
                        User
                    </div>
                    <div class="card-body">
                        <p>{{$comment->text}}</p>
                        <footer class="blockquote-footer">Created at: {{$comment->created_at}}</footer>
                    </div>
                </div>
                @endforeach


                <div class="comment-section">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('comments.store')}}" method='POST'>
                        @csrf
                        <input type="hidden" id="article_id" name="article_id" value="{{$article->id}}">
                        <textarea class="form-control" id="text" name="text" rows="2" placeholder="Lascia un commento..."></textarea>
                        <button type="submit" class="btn btn-primary bcomment">Commenta</button>
                    </form>
                </div>


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