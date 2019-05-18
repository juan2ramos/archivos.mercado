<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDirectoryRequest;

class DirectoryController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function store(CreateDirectoryRequest $request)
    {
        return $request->createDirectory();
    }
}
