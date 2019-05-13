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
            'password' => 'required',
            'business_name' => 'required',
            'verification_code' => 'required','numeric',
            'nit' => ['required','numeric',  Rule::unique('clients')],
            'address' => 'required',
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
                'verification_code' => $this->verification_code,
                'address' => $this->address,
            ]);
            Storage::makeDirectory("mercado/$this->nit");
        });
    }
}
