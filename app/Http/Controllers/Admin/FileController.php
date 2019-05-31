<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFileRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('admin.files.index', compact('categories'));
    }

    public function store(CreateFileRequest $request)
    {
        $request->createFile();
        return back()->with(['success' => true]);
    }

    public function uploadFileTem(CreateFileRequest $request)
    {
        $file = $request->file('files');
        $mime = $file->getMimeType();
        $name = $file->getClientOriginalName();
        $extension = $file->extension();
        $path = Storage::putFile('mercado/temp', $file, 'public');
        return compact('mime', 'name', 'extension', 'path');
    }

    public function filterProducts(Request $request)
    {
        $files =  File::search($request);
        return $files;
    }

}
