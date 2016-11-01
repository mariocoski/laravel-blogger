<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class HomepageController extends Controller
{

    public function autocomplete()
    {
        return response()->json([
            "results" => [
                [
                    "title" => "Result Title",
                    "url" => "/optional/url/on/click",
                    "description" => "Optional Description",
                    'image' => 'fox_unsplash.jpg',
                ],
                [
                    "title" => "Result Title",
                    "url" => "/optional/url/on/click",
                    "description" => "Optional Description",
                    'image' => 'fox_unsplash.jpeg',
                ],
                [
                    "title" => "Result Title",
                    "url" => "/optional/url/on/click",
                    "description" => "Optional Description",
                    'image' => 'fox_unsplash.jpeg',
                ],
                [
                    "title" => "Result Title",
                    "url" => "/optional/url/on/click",
                    "description" => "Optional Description",
                    'image' => 'fox_unsplash.jpeg',
                ],
            ],
            // optional action below results
            "action" => [
                "url" => '/path/to/results',
                "text" => "View all 202 results",
            ],
        ]);
        return response()->json(['searched for' => $request->input('q')]);
    }

    public function index()
    {
        $articles = Article::paginate(config('blogger.pagination.articles_per_page'));
        return view('index', compact('articles'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function search()
    {
        return view('frontend.search');
    }

    public function terms()
    {
        return view('welcome');
    }
}
