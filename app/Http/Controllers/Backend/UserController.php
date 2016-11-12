<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

    public function show($id)
    {
        $user = User::findOrFail($id)->with('roles');
        $roles = Role::all();
        return View::make('backend.users.edit', compact('user', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return View::make('backend.users.edit', compact('roles'));
    }
}
