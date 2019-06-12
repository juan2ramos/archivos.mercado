<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\ManageFiles\ViewFiles;
use App\User;
use Illuminate\Http\Request;

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

    public function createAdmin()
    {
        return view('admin.users.createAdmin');
    }

    public function storeAdmin(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $user->assignRole('SuperAdmin');
        return redirect()->back()->with(['success' => true]);
    }
}
