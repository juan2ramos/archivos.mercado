<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|min:8',
            'business_name' => 'required',
            'nit' => ['required', 'numeric', Rule::unique('clients')],
            'address' => 'required',
        ]);
    }

    protected function create($data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $user->save();
            $user->assignRole('Client');
            $user->client()->create([
                'business_name' => $data['business_name'],
                'nit' => $data['nit'],
                'address' => $data['address'],
            ]);
            Storage::makeDirectory("mercado/" . $data['nit']);

            return $user;
        });
    }
}
