<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleCreateRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Traits\RelatedArticles;
use Auth;
use View;

class ArticleController extends Controller
{
    use RelatedArticles;

    public function index()
    {
        $articles = Article::with('tags', 'author')->orderBy('created_at')->get();

        return View::make('backend.articles.index', compact('articles'));
    }

    public function show($id)
    {
        return redirect()->action('Backend\ArticleController@edit', $id);
    }

    public function edit($id)
    {
        $users = User::all();

        $tags = Tag::all();

        $categories = Category::all();

        $article = Article::with('tags', 'author', 'category')->findOrFail($id);

        return View::make('backend.articles.edit', compact('article', 'users', 'categories', 'tags'));
    }

    public function create()
    {
        $users = User::all();

        $tags = Tag::all();

        $categories = Category::all();

        return View::make('backend.articles.edit', compact('users', 'categories', 'tags'));
    }

    public function store(ArticleCreateRequest $request)
    {

        $article = Article::create($request->getValidRequest());

        $article->fresh()->updateTags($request->tags);

        return redirect('dashboard/articles')->with('status', 'Article has been created');
    }

    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update($request->getValidRequest());

        $article->fresh()->updateTags($request->tags);

        return redirect()->back()->with('status', 'Article has been updated');
    }

    public function destroy($id)
    {
        Article::findOrFail($id)->delete($id);

        return redirect()->back()->with('status', 'Article has been deleted');
    }

    public function favouriteArticles()
    {
        $articles = Auth::user()->favourites;

        return view('backend.articles.favourites', compact('articles'));
    }

    public function preview($id)
    {
        $article = Article::with('tags', 'author', 'category')->findOrFail($id);

        $relatedArticles = ($this->getRelatedArticles($article)->count() > 3) ? $this->getRelatedArticles($article)->random(3) : $this->getRelatedArticles($article);

        return View::make('frontend.articles.show', compact('article', 'relatedArticles'));

    }
}
