<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use View;
class DashboardController extends Controller
{
    public function index(){
      return View::make('backend.dashboard.index');
    }
}
