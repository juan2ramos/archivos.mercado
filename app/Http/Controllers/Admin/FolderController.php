<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFolderRequest;

class FolderController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function store(CreateFolderRequest $request)
    {
        return $request->createFolder();
    }
}
