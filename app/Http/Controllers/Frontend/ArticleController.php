<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::published()->paginate(config('blogger.pagination.articles_per_page'));
        return view('index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('frontend.articles.show', compact('article'));
    }

    public function favorite(Request $request)
    {
        $article = Article::findOrFail($request->input('id'));

        $user = Auth::user()->favorites()->toggle($article->id);

        return response()->json(['success' => true]);
    }

}
