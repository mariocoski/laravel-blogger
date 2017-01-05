<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Storage;
use View;

class AvatarController extends Controller
{

    private $fileContent;
    private $fileExtension;
    private $storagePath;

    public function edit()
    {
        $user = Auth::user();

        return View::make('backend.avatar.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->getDecodedImage($request->input('endodedData'));
        $this->getImageExtension();
        $this->storeFile();
        $this->saveUserAvatar();
        return response()->json(["success" => true]);
    }

    private function getDecodedImage($input)
    {
        list($type, $data) = explode(';', $input);
        list(, $data)      = explode(',', $data);
        $this->fileContent = base64_decode($data);
    }

    private function getImageExtension()
    {
        $f                   = finfo_open();
        $mime_type           = finfo_buffer($f, $this->fileContent, FILEINFO_MIME_TYPE);
        $split               = explode('/', $mime_type);
        $this->fileExtension = $split[1];
    }

    private function storeFile()
    {
        $this->storagePath = Auth::user()->id . "." . $this->fileExtension;
        Storage::disk('avatars')->put($this->storagePath, $this->fileContent);
    }

    private function saveUserAvatar()
    {
        $user         = Auth::user();
        $user->avatar = $this->storagePath;
        $user->save();
    }

}
