<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function createCategory()
    {
        return Category::create(['name' => $this->name]);
    }
}
