<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Artisan;
use View;

class ToolsController extends Controller
{

    public function index()
    {
        return View::make('backend.tools.index');
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('optimize');
            return redirect()->back()->with('success', 'Cache has been cleared created');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was a problem with clearing a cache');
        }

    }
}
