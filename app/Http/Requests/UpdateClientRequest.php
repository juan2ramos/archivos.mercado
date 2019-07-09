<?php

namespace App\Http\Requests;

use App\ManageFiles\ViewFiles;
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
            'password' => 'nullable|min:8',

            'address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya esta en uso',
            'business_name.required' => 'La razón social es requerido',
            'nit.required' => 'El NIT es requerido',
            'nit.numeric' => 'El NIT debe ser numérico',
            'nit.unique' => 'El NIT ya esta en uso',
            'password.min' => 'La contraseña debe tener mínimo 8 carácteres ',
            'address.required' => 'La dirección es requerida',
        ];

    }

    public function updateClient(ViewFiles $viewFiles)
    {
        if ($this->nit != $this->client->nit) {
            $viewFiles->updateNit(['nit' => $this->nit, 'nameBack' => $this->client->nit]);
        }

        $client = $this->client->fill([
            'business_name' => $this->business_name,
            'nit' => $this->nit,
            'address' => $this->address,
        ]);

        $client->save();

        $dataUser = ['name' => $this->name, 'email' => $this->email,];

        if ($this->password != null) {
            $dataUser ['password'] = bcrypt($this->password);
        }
        $client->user->update($dataUser);

        return $client;
    }
}
