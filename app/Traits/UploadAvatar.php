<?php

namespace App\Traits;

use Auth;
use Storage;

trait UploadAvatar
{

    private $fileContent;
    private $fileExtension;
    private $mimeType;
    private $storagePath;
    private $VALID_IMAGES_TYPES = ["image/gif", "image/jpeg", "image/png"];

    private function getFileContent($encodedInput)
    {
        list($type, $data) = explode(';', $encodedInput);
        list(, $data)      = explode(',', $data);
        $this->fileContent = base64_decode($data);
    }

    private function getFileExtension()
    {
        $f                   = finfo_open();
        $this->mimeType      = finfo_buffer($f, $this->fileContent, FILEINFO_MIME_TYPE);
        $split               = explode('/', $this->mimeType);
        $this->fileExtension = $split[1];
    }

    private function isValidImage()
    {
        if (in_array($this->mimeType, $this->VALID_IMAGES_TYPES)) {
            return true;
        }
        return false;
    }

    private function storeFile($userId = null)
    {
        $filename = ($userId) ?? Auth::user()->id;

        $this->storagePath = $filename . "." . $this->fileExtension;

        Storage::disk('avatars')->put($this->storagePath, $this->fileContent);
    }

    private function saveAvatarForUser($user = null)
    {
        $user = ($user) ?? Auth::user();

        $this->storeFile($user->id);

        $user->avatar = $this->storagePath;

        $user->save();
    }
}
