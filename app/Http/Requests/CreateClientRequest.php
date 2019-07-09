<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CreateClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|min:8',
            'business_name' => 'required',
            'nit' => ['required', 'numeric', Rule::unique('clients')],
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya esta en uso',
            'password.required' => 'La contraseña es requerida',
            'business_name.required' => 'La razón social es requerido',
            'nit.required' => 'El NIT es requerido',
            'nit.numeric' => 'El NIT debe ser numérico',
            'nit.unique' => 'El NIT ya esta en uso',
            'address.required' => 'La dirección es requerida',
            'password.min' => 'La contraseña debe tener mínimo 8 carácteres ',
        ];
    }

    public function createClient()
    {
        DB::transaction(function () {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
            $user->save();
            $user->assignRole('Client');
            $user->client()->create([
                'business_name' => $this->business_name,
                'nit' => $this->nit,
                'address' => $this->address,
            ]);
            Storage::makeDirectory("mercado/$this->nit");
        });
    }
}
