<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function list(Tag $tag)
    {
        return view('tag.articles_list', compact('tag'));
    }
}
