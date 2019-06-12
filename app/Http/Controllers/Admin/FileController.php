<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFileRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdmin')->except('filterFiles', 'index', 'filterProducts');
    }

    public function index(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('filesByClient');
        }
        $search = $request->get('search');
        $files = $search ? $this->filterProducts($request) : '{}';

        $categories = Category::all();
        return view('admin.files.index', compact('categories', 'files', 'search'));
    }

    public function store(CreateFileRequest $request)
    {
        $request->createFile();
        return back()->with(['success' => true]);
    }

    public function uploadFileTem(Request $request)
    {
        $file = $request->file('files');
        $mime = $file->getMimeType();
        $name = $file->getClientOriginalName();
        $extension = $file->extension();
        $path = Storage::putFile('mercado/temp', $file, 'public');
        return compact('mime', 'name', 'extension', 'path');
    }

    public function destroy(File $file)
    {
        if (Gate::denies('isAdmin')) {
            abort(404);
        }
        $file->delete();

        return ['success' => true];
    }

    public function filterProducts(Request $request)
    {
        return File::search($request)->load('client');
    }

    public function filterFiles(Request $request)
    {
        $categories = Category::all();
        $search = $request->get('search');
        $files = ($request->get('search')) ? $this->filterProducts($request) : '{}';
        return view('admin.files.index', compact('categories', 'files', 'search'));
    }

}
