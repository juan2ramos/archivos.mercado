<?php

Route::get('/', 'DirectoryController@index')->middleware('can:isAdmin')->name('dashboard');

Route::resource('usuarios', 'ClientController')
    ->names('users')
    ->parameters(['usuarios' => 'client'])
    ->middleware('can:isAdmin');

Route::resource('directorios', 'DirectoryController')
    ->names('directory')
    ->parameters(['directorios' => 'directory'])
    ->middleware('can:isAdmin');

Route::resource('archivos', 'FileController')
    ->names('files')
    ->parameters(['archivos' => 'file'])
    ->middleware('can:isAdmin');

Route::post('archivos/uploadFileTemp', 'FileController@uploadFileTem')
    ->middleware('can:isAdmin')->name('files.uploadFileTemp');

Route::post('archivos/downloadFile', 'FileController@downloadFile')
    ->middleware('can:isAdmin')->name('files.downloadFile');

Route::get('usuarios/{client}/subir-archivo', 'ClientController@uploadFile')
    ->middleware('can:isAdmin')->name('client.uploadFile');

Route::resource('categorias', 'CategoryController')
    ->names('category')
    ->parameters(['categorias' => 'category'])
    ->middleware('can:isAdmin');





