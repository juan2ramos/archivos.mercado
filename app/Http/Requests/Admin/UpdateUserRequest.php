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
        if (!$this->user->isAdmin()) {
            $rules += [
                'business_name' => 'required',
                'verification_code' => 'required', 'numeric',
                'nit' => [
                    'required', 'numeric',
                     Rule::unique('clients')->ignore($this->user->client)
                ],
                'address' => 'required',
            ];
        }
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
        if (!$this->user->isAdmin()) {

            $this->user->client()->update([
                'business_name' => $this->business_name,
                'nit' => $this->nit,
                'verification_code' => $this->verification_code,
                'address' => $this->address,
            ]);
            if ($this->nit != Auth::user()->client->nit) {
                $viewFiles->updateNit(['nit' => $this->nit, 'nameBack' => $this->user->client->nit]);
            }
        }
    }
}
