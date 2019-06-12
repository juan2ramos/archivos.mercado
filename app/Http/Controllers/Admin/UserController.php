<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\ManageFiles\ViewFiles;

class UserController extends Controller
{

    public function index()
    {
        $user = auth()->user()->load('client');

        return view('admin.users.profile', compact('user'));
    }

    public function update(UpdateUserRequest $request, ViewFiles $viewFiles)
    {

        $request->updateUser($viewFiles);
        return back()->with(['success' => 'Usuario actualizado correctamente']);
    }
}
