<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use View;

class SubscriptionController extends Controller
{
    public function index()
    {
        return View::make('backend.subscriptions.index');
    }
}
