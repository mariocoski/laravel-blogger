<?php
namespace App\Services;

use App\Models\User;
use Auth;
use Redirect;
use Socialite;

class Socializer
{

    protected $providerName;
    protected $providerColumnName;
    protected $successRedirectPath;
    protected $errorRedirectPath;

    public function __construct($providerName)
    {
        $this->providerName = $providerName;
    }

    public function login()
    {
        return Socialite::driver($this->providerName)->redirect();
    }

    public function setColumnName($providerColumnName)
    {
        $this->providerColumnName = $providerColumnName;
        return $this;
    }
    public function setSuccessRedirectPath($successRedirectPath)
    {
        $this->successRedirectPath = $successRedirectPath;
        return $this;
    }
    public function setErrorRedirectPath($errorRedirectPath)
    {
        $this->errorRedirectPath = $errorRedirectPath;
        return $this;
    }

    public function callback()
    {
        try {
            $authUser = Socialite::driver($this->providerName)->user();
        } catch (\Exception $e) {
            return Redirect::to($this->errorRedirectPath);
        }

        $user = $this->findOrCreate($authUser);

        Auth::login($user, true);

        return Redirect::to($this->successRedirectPath);
    }

    private function findOrCreate($authUser)
    {
        $user = User::firstOrNew([
            $this->providerColumnName => $authUser->id,
        ]);

        if ($user->exists) {
            return $user;
        }

        $user->updateOAuthData($authUser);

        $user->saveAvatar($authUser->avatar);

        $user->resolveRole();

        return $user;

    }

}
