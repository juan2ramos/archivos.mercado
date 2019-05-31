<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->client->user)],
            'business_name' => 'required',
            'nit' => ['required', 'numeric', Rule::unique('clients')->ignore($this->client)],
            'password' => 'nullable|min:6',
            'verification_code' => 'required', 'numeric',
            'address' => 'required',
        ];
    }

    public function updateClient()
    {
        $client = $this->client->fill([
            'business_name' => $this->business_name,
            'nit' => $this->nit,
            'verification_code' => $this->verification_code,
            'address' => $this->address,
        ]);

        $client->save();
        $dataUser = ['name' => $this->name, 'email' => $this->email,];

        if ($this->password != null) {
            $dataUser ['password']= bcrypt($this->password);
        }
        $client->user->update($dataUser);

        return $client;
    }
}
