<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use DB;
class HomeController extends Controller
{


    public function index()
    {
        $storage = storage_path('tmp');

        $files = File::allFiles($storage);

        return view('Home.index', compact('files'));
    }




}
