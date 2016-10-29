<?php
namespace App\Traits;
use App\Models\User;
use Auth;
use Redirect;
use Socialite;
trait OAuthenticable {

	public function login() {
		return Socialite::driver($this->getProviderName())->redirect();
	}

	public function callback() {
		try {
			$user = Socialite::driver($this->getProviderName())->user();
		} catch (\Exception $e) {
			return Redirect::to($this->getProviderErrorRedirectPath());
		}
		$authUser = $this->findOrUpdate($user);
		Auth::login($authUser, true);
		return Redirect::to($this->getProviderSuccessRedirectPath());
	}

	private function findOrUpdate($user) {
		if (!empty($user->email)) {
			return $this->findByEmailOrCreate($user);
		}
		return $this->findByIdOrCreate($user);
	}

	private function findByEmailOrCreate($user) {
		if ($authUser = User::where('email', $user->email)->first()) {
			$authUser[$this->getProviderColumnName()] = $user->id;
			$authUser->save();
			return $authUser;
		}
		return $this->createuser($user);
	}

	private function findByIdOrCreate($user) {
		if ($authUser = User::where($this->getProviderColumnName(), $user->id)->first()) {
			return $authUser;
		}
		return $this->createuser($user);
	}

	private function createUser($user) {
		return User::create([
			'display_name' => $user->name,
			'email' => $user->email,
			$this->getProviderColumnName() => $user->id,
			'avatar' => $user->avatar,
		]);
	}
}
