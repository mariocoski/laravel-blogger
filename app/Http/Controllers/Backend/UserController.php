<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use View;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return View::make('backend.users.index', compact('users'));
    }
}
