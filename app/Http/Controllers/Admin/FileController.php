<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFileRequest;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function store(CreateFileRequest $request)
    {
        $request->createFile();
        return back()->with(['success' => true]);
    }

    public function uploadFileTem(CreateFileRequest $request)
    {
        $file = $request->file('files');
        $mime = $file->getMimeType();
        $name = $file->getFilename();
        $extension = $file->extension();
        $path = Storage::putFile('mercado/temp', $file, 'public');
        return compact('mime', 'name', 'extension', 'path');
    }



}
