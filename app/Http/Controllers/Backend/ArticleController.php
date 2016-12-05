<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use View;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags', 'author')->orderBy('created_at')->get();
        return View::make('backend.articles.index', compact('articles'));
    }

    public function show($id)
    {
        $users = User::all();

        $tags = Tag::all();

        $categories = Category::all();

        $article = Article::with('tags', 'author', 'category')->findOrFail($id);

        return View::make('backend.articles.edit', compact('article', 'users', 'categories', 'tags'));
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

    public function store(UserCreateRequest $request)
    {
        // $user = User::create($request->getValidRequest());

        // $user->resolveRole($request->role);

        // return redirect('dashboard/users')->with('status', 'New user has been created');
    }

    public function update(UserUpdateRequest $request, $id)
    {

        // $user = User::findOrFail($id);

        // $user->update($request->getValidRequest());

        // $user->resolveRole($request->role);

        // return redirect()->back()->with('status', 'User has been updated');
    }

    public function destroy($id)
    {
        Article::findOrFail($id)->delete($id);

        return redirect()->back()->with('status', 'Article has been deleted');
    }
}
