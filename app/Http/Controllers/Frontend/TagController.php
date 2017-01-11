<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all()->sort(function ($previousTag, $nextTag) {
            if ($previousTag->getArticlesCountAttribute() === $nextTag->getArticlesCountAttribute()) {
                return 0;
            }
            return ($previousTag->getArticlesCountAttribute() < $nextTag->getArticlesCountAttribute()) ? 1 : -1;
        });

        return view('frontend.tags.index', compact('tags'));
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->with('articles')->firstOrFail();
        return view('frontend.tags.show', compact('tag'));
    }

}
