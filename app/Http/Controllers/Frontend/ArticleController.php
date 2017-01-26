<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Traits\RelatedArticles;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    use RelatedArticles;

    public function index()
    {
        $articles = Article::published()->paginate(config('blogger.articles_per_page'));

        return view('frontend.articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        $relatedArticles = ($this->getRelatedArticles($article)->count() > 3) ? $this->getRelatedArticles($article)->random(3) : $this->getRelatedArticles($article);

        return view('frontend.articles.show', compact('article', 'relatedArticles'));
    }

    public function favourites(Request $request)
    {
        $article = Article::findOrFail($request->input('id'));

        $user = Auth::user()->favourites()->toggle($article->id);

        return response()->json(['success' => true]);
    }

}
