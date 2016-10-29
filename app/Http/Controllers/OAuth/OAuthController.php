<?php

namespace App\Http\Controllers\OAuth;
use App\Http\Controllers\Controller;
use \App\Traits\OAuthenticable;

abstract class OAuthController extends Controller {
	use OAuthenticable;
	public function getProviderSuccessRedirectPath() {
		return config('blogger.auth.success');
	}
	abstract public function getProviderErrorRedirectPath();
	abstract public function getProviderColumnName();
	abstract public function getProviderName();
}
