<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    //FIle manager function

    public function filemanager(Request $request)
    {
        return view('admin.filemanager.filemanager');
    }
}
