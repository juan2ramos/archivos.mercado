<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toValidate()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('dashboard');
        }

        if (Auth::user()->validate) {
            return redirect()->route('dashboard');
        }

        return view('admin.home');
    }
}
