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
            $user = Socialite::driver($this->providerName)->user();
        } catch (\Exception $e) {
            return Redirect::to($this->errorRedirectPath);
        }
        $authUser = $this->findOrUpdate($user);
        Auth::login($authUser, true);
        return Redirect::to($this->successRedirectPath);
    }

    private function findOrUpdate($user)
    {
        if (!empty($user->email)) {
            return $this->findByEmailOrCreate($user);
        }
        return $this->findByIdOrCreate($user);
    }

    private function findByEmailOrCreate($user)
    {
        if ($authUser = User::where('email', $user->email)->first()) {
            $authUser[$this->providerColumnName] = $user->id;
            $authUser->save();
            return $authUser;
        }
        return $this->createuser($user);
    }

    private function findByIdOrCreate($user)
    {
        if ($authUser = User::where($this->providerColumnName, $user->id)->first()) {
            return $authUser;
        }
        return $this->createuser($user);
    }

    private function createUser($user)
    {
        return User::create([
            'display_name' => $user->name,
            'email' => $user->email,
            $this->providerColumnName => $user->id,
            'avatar' => $user->avatar,
        ]);
    }
}
