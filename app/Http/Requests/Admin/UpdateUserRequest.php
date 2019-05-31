<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore(Auth::user())
            ],
            'password' => '',
        ];
    }
    public function updateUser(){

        $user = Auth::user();
        $user->fill([
            'name' => $this->name,
            'email' => $this->email
        ]);
        if ($this->password != null) {
            $user->password = bcrypt($this->password);
        }
        $user->save();
    }
}
