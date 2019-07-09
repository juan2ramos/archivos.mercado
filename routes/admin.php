<?php

Route::get('/', 'FileController@index')->name('dashboard');

Route::resource('usuarios', 'ClientController')
    ->names('users')
    ->parameters(['usuarios' => 'client']);

Route::resource('directorios', 'DirectoryController')
    ->names('directory')
    ->parameters(['directorios' => 'directory'])
    ->middleware('can:isAdmin');

Route::post('directorios/delete', 'DirectoryController@delete')
    ->middleware('can:isAdmin')->name('directory.delete');

Route::resource('archivos', 'FileController')
    ->names('files')
    ->parameters(['archivos' => 'file']);

Route::post('archivos/uploadFileTemp', 'FileController@uploadFileTem')
    ->middleware('can:isAdmin')->name('files.uploadFileTemp');

Route::post('archivos/downloadFile', 'FileController@downloadFile')
    ->middleware('can:isAdmin')->name('files.downloadFile');

Route::get('usuarios/{client}/subir-archivo', 'ClientController@uploadFile')
    ->middleware('can:isAdmin')->name('client.uploadFile');

Route::get('usuarios/crear/admin', 'UserController@createAdmin')
    ->middleware('can:isAdmin')->name('users.create.admin');

Route::post('usuarios/crear/admin', 'UserController@storeAdmin')
    ->middleware('can:isAdmin')->name('users.store.admin');

Route::get('filter-products', 'FileController@filterProducts')->name('files.filter');

Route::get('perfil', 'UserController@index')->name('profile');
Route::post('perfil', 'UserController@update')->name('profile.update');
Route::put('usuarios-Admin/{user}', 'UserController@updateAdmin')
    ->middleware('can:isAdmin');

Route::resource('categorias', 'CategoryController')
    ->names('category')
    ->parameters(['categorias' => 'category'])
    ->middleware('can:isAdmin');

Route::get('mis-archivos', 'ClientController@filesByClient')->name('filesByClient');

Route::get('archivos', 'FileController@filterFiles')->name('filterFiles');
Route::get('validar-usuarios', 'UserController@validateUser')->name('validate.user');
Route::post('validate', 'UserController@validateClient')->name('validate.validate');

