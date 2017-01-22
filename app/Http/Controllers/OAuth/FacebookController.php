<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\OAuth\OAuthController;

class FacebookController extends OAuthController
{
    public function getProviderName()
    {
        return "facebook";
    }

    public function getProviderColumnName()
    {
        return "facebook_id";
    }

    public function getProviderErrorRedirectPath()
    {
        return "auth/facebook";
    }

}
