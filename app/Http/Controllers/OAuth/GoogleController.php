<?php
namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\OAuth\OAuthController;

class GoogleController extends OAuthController
{
    public function getProviderName()
    {
        return "google";
    }

    public function getProviderColumnName()
    {
        return "google_id";
    }

    public function getProviderErrorRedirectPath()
    {
        return "auth/google";
    }
}
