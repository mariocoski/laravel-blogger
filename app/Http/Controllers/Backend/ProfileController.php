<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use View;

class ProfileController extends Controller {
	public function index() {
		return View::make('backend.profile.index');
	}
}
