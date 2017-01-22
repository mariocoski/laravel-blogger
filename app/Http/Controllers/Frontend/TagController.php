<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all()->sort(function ($previousTag, $nextTag) {
            return $previousTag->getArticlesCountAttribute() <=> $nextTag->getArticlesCountAttribute();
        })->reverse();

        return view('frontend.tags.index', compact('tags'));
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->with('articles')->firstOrFail();

        return view('frontend.tags.show', compact('tag'));
    }

}
