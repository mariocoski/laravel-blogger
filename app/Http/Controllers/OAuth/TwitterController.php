<?php
namespace App\Http\Controllers\OAuth;

class TwitterController extends OAuthController
{
    public function getProviderName()
    {
        return "twitter";
    }

    public function getProviderColumnName()
    {
        return "twitter_id";
    }

    public function getProviderErrorRedirectPath()
    {
        return "auth/twitter";
    }
}
