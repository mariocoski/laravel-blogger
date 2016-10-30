<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use View;

class SettingsController extends Controller {
	public function index() {
		return View::make('backend.settings.index');
	}
}
