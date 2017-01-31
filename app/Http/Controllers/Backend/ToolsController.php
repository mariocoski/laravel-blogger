<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Artisan;
use View;

class ToolsController extends Controller
{

    public function index()
    {
        $settings = [
            'isMaintenanceModeEnabled' => app()->isDownForMaintenance(),
        ];

        return View::make('backend.tools.index', $settings);
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('optimize');

            return redirect()->back()->with('success', 'Cache has been cleared');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was a problem with clearing a cache');
        }
    }

    public function maintenanceMode()
    {
        try {
            if (app()->isDownForMaintenance()) {
                Artisan::call('up');
            } else {
                Artisan::call('down');
            }

            $message = 'Maintenance mode was ' . ((app()->isDownForMaintenance()) ? "enabled" : "disabled");

            return redirect()->back()->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was a problem with clearing a cache');
        }
    }

    public function resetIndex()
    {
        try {
            foreach (config('blogger.search_engine.searchable') as $model) {
                Artisan::call('scout:flush', ['model' => $model]);
                Artisan::call('scout:import', ['model' => $model]);
            }

            return redirect()->back()->with('success', 'All indices were successfully reset');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was a problem with reseting your searching index');
        }
    }
}
