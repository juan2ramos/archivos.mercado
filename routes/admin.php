<?php


use Illuminate\Support\Facades\Storage;

Route::get('/', 'FolderController@index')->middleware('can:isAdmin')->name('dashboard');

Route::resource('usuarios', 'ClientController')
    ->names('users')
    ->parameters(['usuarios' => 'client'])
    ->middleware('can:isAdmin');

Route::resource('archivos', 'FolderController')
    ->names('files')
    ->parameters(['archivos' => 'file'])
    ->middleware('can:isAdmin');

Route::get('usuarios/{client}/subir-archivo', 'ClientController@uploadFile')
    ->middleware('can:isAdmin')->name('client.uploadFile');

Route::resource('categorias', 'CategoryController')
    ->names('category')
    ->parameters(['categorias' => 'category'])
    ->middleware('can:isAdmin');




Route::post('archivosaa', function (Request $request) {
    $file = $request->file('files');
    $mimeType = $file->getMimeType();
    $extension = $file->extension();
    $path = Storage::putFile('mercado/nuevo', $file, 'public');
    return ['mimeType' => $mimeType, 'extension' => $extension, 'path' => $path];

})->name('');

Route::get('view', function () {
    $files[0] = Storage::files('mercado/');
    $files[1] = Storage::directories('mercado/');
    dd($files);
    $file = Storage::temporaryUrl('mercado/muHpPecLnx3wyTY3rh8sBnkvzLDYQpVtqZ0a5jTR.pdf', now()->addMinutes(5));
    $headers = ['content-Type' => 'application/pdf'];

    return response($file, 200, $headers);
});




