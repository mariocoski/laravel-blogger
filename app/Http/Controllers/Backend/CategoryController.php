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
        return redirect()->action('Backend\CategoryController@edit', $id);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return View::make('backend.categories.edit', compact('category'));
    }

    public function create()
    {
        return View::make('backend.categories.edit');
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create($request->getValidRequest());

        return redirect('dashboard/categories')->with('status', 'New category has been created');
    }

    public function update(CategoryUpdateRequest $request, $id)
    {

        $category = Category::findOrFail($id)->update($request->getValidRequest());

        return redirect()->back()->with('status', 'Category has been updated');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete($id);

        return redirect()->back()->with('status', 'Category has been deleted');
    }
}
