<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('cerrar-sesion', 'Auth\LoginController@logout')->name('logout');



use Illuminate\Support\Facades\Storage;
use \Illuminate\Http\Request;


Route::post('archivos', function (Request $request) {
    $file = $request->file('files');
    $mimeType = $file->getMimeType();
    $extension = $file->extension();
    $path = Storage::putFile('mercado/nuevo', $file, 'public');
    return ['mimeType' => $mimeType, 'extension' => $extension, 'path' => $path];

})->name('');

Route::get('view', function () {

    $files[0] = Storage::allDirectories('mercado/');
    $files[1] = Storage::directories('mercado/');
    dd($files);
    $file = Storage::temporaryUrl('mercado/muHpPecLnx3wyTY3rh8sBnkvzLDYQpVtqZ0a5jTR.pdf', now()->addMinutes(5));
    $headers = ['content-Type' => 'application/pdf'];

    return response($file, 200, $headers);
});
