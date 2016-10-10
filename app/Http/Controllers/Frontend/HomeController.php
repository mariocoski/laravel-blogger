<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index(){

    }

    public function terms(){
      return view('welcome');
    }
}
