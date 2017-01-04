<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Request;
use Auth;
use View;

class AvatarController extends Controller
{

    public function edit()
    {
        $user = Auth::user();

        return View::make('backend.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        dd($request->getValidRequest());
    }

}
