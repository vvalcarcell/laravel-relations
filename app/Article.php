<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
