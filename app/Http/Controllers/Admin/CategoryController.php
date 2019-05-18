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

    public function update(CreateCategoryRequest $request, Category $category)
    {
        return $request->updateCategory($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return ['success' => true];
    }

}
