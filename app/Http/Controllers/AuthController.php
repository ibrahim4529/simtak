<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'no_identitas';
    }

    public function login()
    {
        return view('auth.login');
    }

    public function do_login(Request $request)
    {
        $form = $request->only('no_identitas', 'password');
        $a = Auth::attempt($form);
        return dd(Auth::user()->id);
    }
}
