<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.profile', ['user' => Auth::user()]);
    }

    public function update(UpdateUserRequest $request)
    {
        $request->updateUser();
        return back()->with(['success' => true]);
    }
}
