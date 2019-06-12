<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDirectoryRequest;
use App\ManageFiles\ViewFiles;
use Illuminate\Http\Request;

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

    public function update(CreateDirectoryRequest $request, ViewFiles $viewFiles)
    {

        return $request->updateDirectory($viewFiles);

    }

    public function delete(Request $request, ViewFiles $viewFiles)
    {
        return ['success' => $viewFiles->delete($request->all())];
    }
}
