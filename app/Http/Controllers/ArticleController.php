<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Article;
use App\Tag;
use App\Mail\NewArticleCreated;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(8);

        foreach ($articles as $article) {
            $article->main = $this->cutArticle($article->main);
        }


        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagList = Tag::all();
        $authors = Author::all();
        return view('articles.create', compact('authors', 'tagList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'main' => 'required',
            'picture' => 'required|url',
            'author_id' => 'required',
            'tags' => 'required'
        ]);

        $data = $request->all();

        $article = new Article();
        $article->title = $data['title'];
        $article->main = $data['main'];
        $article->picture = $data['picture'];
        $article->author_id = $data['author_id'];
        $article->save();

        $article->tags()->sync($data['tags']);

        //dopo aver salvato il nuovo articolo, invio una mail
        Mail::to($article->author->email)->send(new NewArticleCreated($article));


        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function cutArticle($main)
    {
        $cutArticle = substr($main, 0, 100);
        $cutArticle =  $cutArticle . "...";
        return $cutArticle;
    }
}
