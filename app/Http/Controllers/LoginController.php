<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Index(){
        return view('login.lLogin',[
            'title' => 'SignIn'
        ]);
    }

    public function Register(){
        return view('login.lRegister',[
            'title' => 'Registrasi'
        ]);
    }
    
    public function ForgotPassword(){
        return view('login.lForgot',[
            'title' => 'Registrasi'
        ]);
    }
}
