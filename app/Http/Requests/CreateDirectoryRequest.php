<?php

namespace App\Http\Requests;

use App\ManageFiles\ViewFiles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateDirectoryRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'path' => ['required',
                function ($attribute, $value, $fail) {
                    if (!Storage::exists($this->getRootDirectory() . $value)) {
                        $fail('La ruta para la carpeta no existe');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (Storage::exists($this->getRootDirectory() . $value . '/'. $this->get('name'))) {
                       $fail('La carpeta ya existe');
                    }
                },
            ],
        ];
    }

    public function createDirectory()
    {
        $name = Str::slug($this->get('name'));
        $directoryRoute = $this->getRootDirectory() . $this->get('path') . '/' . $name;
        if (Storage::makeDirectory($directoryRoute)) {
            return [
                'name' => $name,
                'url' => $directoryRoute
            ];
        }

        return abort(422, 'No se pudo crear el directorio');
    }

    private function getRootDirectory()
    {
        $viewFile = new ViewFiles();
        return $viewFile->getRootFile();
    }
}
