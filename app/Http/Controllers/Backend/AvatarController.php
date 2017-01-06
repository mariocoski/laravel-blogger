<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\UploadAvatar;
use Auth;
use Illuminate\Http\Request;
use View;

class AvatarController extends Controller
{

    use UploadAvatar;

    public function edit()
    {
        $user = Auth::user();

        return View::make('backend.avatar.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->getFileContent($request->input('encodedData'));

        $this->getFileExtension();

        if ($this->isValidImage() !== true) {
            return response()->json(["success" => false, "error" => "File is not a valid image"], 422);
        }

        $this->saveAvatarForUser();

        return response()->json(["success" => true]);
    }

}
