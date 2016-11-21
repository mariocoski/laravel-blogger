<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name', 'slug'];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article', 'articles_tags', 'article_id', 'tag_id');
    }

    public function getArticlesCountAttribute()
    {
        return $this->articles->count();
    }
}
