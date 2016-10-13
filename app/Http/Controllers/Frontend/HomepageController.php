<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomepageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function authors(){
        return view('frontend.authors');
    }

    public function contact(){
      return view('frontend.contact');
    }

    public function terms(){
      return view('welcome');
    }
}
