<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $append = ['author_name'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'articles_tags', 'article_id', 'tag_id');
    }

    public function updateTags($commaDelimittedTags)
    {
        $tags = explode(',', $commaDelimittedTags);
        $this->tags()->sync($tags);
    }

    public function getAssociatedTagsAttribute()
    {
        return $this->tags->map(function ($tag) {
            return $tag->id;
        })->implode(',');
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
