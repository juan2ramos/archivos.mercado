<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\ManageFiles\ViewFiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $admins = User::role('SuperAdmin')->get();

        return view('admin.users.createAdmin', compact('admins'));
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

    public function updateAdmin(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email ', Rule::unique('users')->ignore($user)],
        ]);

        $user->update($validatedData);
        return $user;
    }

    public function validateUser()
    {
        $users = User::role('Client')->where('validate', 0)->with('client')->get();

        return view('admin.users.validateUsers', compact('users'));
    }

    public function validateClient(Request $request)
    {
        $user = User::find($request->id);
        $user->update(['validate' => 1]);

        return ['success' => true];
    }
}
