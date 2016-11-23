<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use View;

class SettingsController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        return View::make('backend.settings.index', compact('user'));
    }

}
