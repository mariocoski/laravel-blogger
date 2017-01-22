<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use \App\Services\Socializer;

abstract class OAuthController extends Controller
{

    public function login()
    {
        return (new Socializer($this->getProviderName()))->login();
    }

    public function callback()
    {
        return (new Socializer($this->getProviderName()))
            ->setColumnName($this->getProviderColumnName())
            ->setSuccessRedirectPath($this->getProviderSuccessRedirectPath())
            ->setErrorRedirectPath($this->getProviderErrorRedirectPath())
            ->callback();
    }

    public function getProviderSuccessRedirectPath()
    {
        return config('blogger.auth.success');
    }

    abstract public function getProviderErrorRedirectPath();

    abstract public function getProviderColumnName();

    abstract public function getProviderName();
}
