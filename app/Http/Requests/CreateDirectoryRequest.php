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
        $nit = $this->get('nit') . '/';
        return [
            'name' => 'required',
            'path' => ['',
                function ($attribute, $value, $fail) use ($nit) {
                    if (!Storage::exists($this->getRootDirectory() . $nit . $value)) {
                        $fail('La ruta para la carpeta no existe');
                    }
                },
                function ($attribute, $value, $fail) use ($nit) {
                    if (Storage::exists($this->getRootDirectory() . $nit . $value . '/' . $this->get('name'))) {
                        $fail('La carpeta ya existe');
                    }
                },
            ],
        ];
    }

    public function createDirectory()
    {
        $name = Str::slug($this->get('name'));
        $nit = $this->get('nit');
        $directoryRoute = $this->getRootDirectory() . $nit . '/' .$this->get('path')  . $name;
        if (Storage::makeDirectory($directoryRoute)) {
            return [
                'name' => $name,
                'url' => $directoryRoute
            ];
        }

        return abort(422, 'No se pudo crear el directorio');
    }

    public function updateDirectory(ViewFiles $viewFiles)
    {
        $this['name'] = Str::slug($this->get('name'));
        return $viewFiles->updateDirectory($this->all());
    }

    private function getRootDirectory()
    {
        $viewFile = new ViewFiles();
        return $viewFile->getRootFile();
    }
}
