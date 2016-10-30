<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use View;

class CategoriesController extends Controller {
	public function index() {
		return View::make('backend.categories.index');
	}
}
