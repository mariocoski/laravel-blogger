<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use View;

class TagsController extends Controller {
	public function index() {
		return View::make('backend.tags.index');
	}
}
