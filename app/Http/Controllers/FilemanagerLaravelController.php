<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Pqb\FilemanagerLaravel\FilemanagerLaravel;

class FilemanagerLaravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:editor');

    }
    public function getShow()
    {
        return view('filemanager-laravel::filemanager.index');
    }
    public function getConnectors()
    {
        $f = FilemanagerLaravel::Filemanager();
        $f->connector_url = url('/') . '/filemanager/connectors';
        $f->run();
    }
    public function postConnectors()
    {
        $f = FilemanagerLaravel::Filemanager();
        $f->connector_url = url('/') . '/filemanager/connectors';
        $f->run();
    }

}
