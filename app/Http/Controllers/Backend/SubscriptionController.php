<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use View;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscribers = Subscription::all();

        return View::make('backend.subscriptions.index', compact('subscribers'));
    }
}
