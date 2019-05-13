<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        return $request->createCategory();
    }

}
