<?php

namespace App\Http\Requests\Admin;

use App\ManageFiles\ViewFiles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    private $user;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->user = Auth::user();
        $rules = [
            'name' => 'required',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user)
            ],
            'password' => '',
        ];

        return $rules;
    }

    public function updateUser(ViewFiles $viewFiles)
    {

        $this->user->fill([
            'name' => $this->name,
            'email' => $this->email
        ]);
        if ($this->password != null) {
            $this->user->password = bcrypt($this->password);
        }
        $this->user->save();


    }
}
