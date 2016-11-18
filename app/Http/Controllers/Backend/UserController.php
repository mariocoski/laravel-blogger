<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use View;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return View::make('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return View::make('backend.users.edit', compact('user', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return View::make('backend.users.edit', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->getValidRequest());

        $user->resolveRole($request->role);

        return redirect('dashboard/users')->with('status', 'New user has been created');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id)->update($request->getValidRequest());

        return redirect()->back()->with('status', 'User has been updated');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete($id);

        return redirect()->back()->with('status', 'User has been deleted');
    }
}
