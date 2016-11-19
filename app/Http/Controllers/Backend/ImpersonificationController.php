<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Session;

class ImpersonificationController extends Controller
{

    public function impersonate($id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            redirect()->back();
        }

        Session::put(config('blogger.auth.impersonification.session_name'), Auth::user()->id);

        Auth::login($user, true);

        return redirect()->to('/dashboard');
    }

    public function backToAdminMode()
    {

        $adminId = config('blogger.auth.impersonification.session_name');

        if (Session::has($adminId)) {

            $user = User::findOrFail(Session::get($adminId));

            Session::remove($adminId);

            Auth::logout();

            Auth::login($user, true);

        }
        return redirect()->to('/dashboard');
    }
}
