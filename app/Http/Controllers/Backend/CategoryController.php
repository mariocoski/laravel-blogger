<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use View;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return View::make('backend.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return View::make('backend.categories.edit', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return View::make('backend.categories.edit', compact('category'));
    }

    public function create()
    {

        return View::make('backend.categories.edit', compact('category', 'users'));
    }

    public function store(CategoryCreateRequest $request)
    {
        // $user = User::create($request->getValidRequest());

        // $user->resolveRole($request->role);

        // return redirect('dashboard/users')->with('status', 'New user has been created');
    }

    public function update(CategoryUpdateRequest $request, $id)
    {

        // $user = User::findOrFail($id);

        // $user->update($request->getValidRequest());

        // $user->resolveRole($request->role);

        // return redirect()->back()->with('status', 'User has been updated');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete($id);

        return redirect()->back()->with('status', 'Category has been deleted');
    }
}
