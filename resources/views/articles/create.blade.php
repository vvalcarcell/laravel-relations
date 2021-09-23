@extends('templates.structure')


@section('content')
<div class="container create">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label> <br>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="form-group">
            <label for="picture">Picture</label> <br>
            <input type="text" class="form-control" name="picture" id="picture">
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="genere">Category</label>
                </div>
                <select class="custom-select" id="genere" name="genere">
                    <option selected>Choose...</option>
                    @foreach($categoryList as $genere)
                    <option value="{{$genere}}">{{ $genere }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group green-border-focus">
            <label for="main">Write the article...</label>
            <textarea class="form-control" id="main" name="main" rows="3"></textarea>
        </div>


        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="author_id">Author</label>
                </div>
                <select class="custom-select" id="author_id" name="author_id">
                    <option selected>Choose...</option>
                    @foreach($authors as $author)
                    <option value="{{$author->id}}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Save</button>


    </form>


</div>
@endsection