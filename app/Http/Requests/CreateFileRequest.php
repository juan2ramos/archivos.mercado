<?php

namespace App\Http\Requests;

use App\Events\NewFile;
use App\Models\Client;
use App\Models\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CreateFileRequest extends FormRequest
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
            'category_id' => 'required',
            'directory' => 'required',
            'path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Debes elegir una categoria',
            'directory.required' => 'Debes elegir un directorio',
            'month.required' => 'Debes elegir el mes',
            'year.required' => 'Debes elegir el año',
            'path.required' => 'Debes agregar un archivo',
        ];
    }

    public function createFile()
    {
        DB::transaction(function () {
            $data = $this->all();
            $client = Client::find($data['client_id']);

            $path = $data['directory'] . '/' . Str::random(40) . '.' . $data['extension'];
            Storage::move($data['path'], $path);

            $data['path'] = $path;
            $file = new File($data);

            $client->files()->save($file);
            NewFile::dispatch($client->user, $file);

        });
    }
}


