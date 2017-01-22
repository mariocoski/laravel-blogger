<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all()->sort(function ($previousCategory, $nextCategory) {
            return $previousCategory->getArticlesCountAttribute() <=> $nextCategory->getArticlesCountAttribute();
        })->reverse();

        return view('frontend.categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('articles')->firstOrFail();

        return view('frontend.categories.show', compact('category'));
    }

}
