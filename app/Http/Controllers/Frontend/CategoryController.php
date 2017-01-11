<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all()->sort(function ($previousCategory, $nextCategory) {
            if ($previousCategory->getArticlesCountAttribute() === $nextCategory->getArticlesCountAttribute()) {
                return 0;
            }
            return ($previousCategory->getArticlesCountAttribute() < $nextCategory->getArticlesCountAttribute()) ? 1 : -1;
        });

        return view('frontend.categories.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('articles')->firstOrFail();
        return view('frontend.categories.show', compact('category'));
    }

}
