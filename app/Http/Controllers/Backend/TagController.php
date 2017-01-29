<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagCreateRequest;
use App\Http\Requests\Tag\TagUpdateRequest;
use App\Models\Tag;
use View;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return View::make('backend.tags.index', compact('tags'));
    }

    public function show($id)
    {
        return redirect()->action('Backend\TagController@edit', $id);
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return View::make('backend.tags.edit', compact('tag'));
    }

    public function create()
    {
        return View::make('backend.tags.edit');
    }

    public function store(TagCreateRequest $request)
    {
        $tag = Tag::create($request->getValidRequest());

        return redirect('dashboard/tags')->with('status', 'New Tag has been created');
    }

    public function update(TagUpdateRequest $request, $id)
    {

        $tag = Tag::findOrFail($id)->update($request->getValidRequest());

        return redirect()->back()->with('status', 'Tag has been updated');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete($id);

        return redirect()->back()->with('status', 'Tag has been deleted');
    }
}
