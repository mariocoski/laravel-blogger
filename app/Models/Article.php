<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'articles_tags', 'tag_id', 'article_id');
    }
}
