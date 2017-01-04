<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use Auth;
use View;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();

        return View::make('backend.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $user->update($request->getValidRequest());

        return redirect()->back()->with('status', 'Profile has been updated');
    }

}
