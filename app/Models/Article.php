<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    protected $append = ['author_name'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'articles_tags', 'tag_id', 'article_id');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function getAuthorNameAttribute()
    {
        return ($this->author->display_name) ?? $this->author->email;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

}
