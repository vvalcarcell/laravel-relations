<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Article;

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
        $categoryList = [
            'cronaca',
            'sport',
            'opinione',
            'musica',
            'cinema',
            'moda'
        ];
        $authors = Author::all();
        return view('articles.create', compact('authors', 'categoryList'));
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
            'genere' => 'required|string|max:50',
            'main' => 'required',
            'picture' => 'required|url',
            'author_id' => 'required',
        ]);

        $data = $request->all();

        $article = new Article();
        $article->title = $data['title'];
        $article->genere = $data['genere'];
        $article->main = $data['main'];
        $article->picture = $data['picture'];
        $article->author_id = $data['author_id'];
        $article->save();


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
