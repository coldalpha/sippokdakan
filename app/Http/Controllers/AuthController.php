<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class AuthController extends Controller
{
    // LOGIN---------------LOGIN-------------LOGIN
    // LOGIN---------------LOGIN-------------LOGIN
    // LOGIN---------------LOGIN-------------LOGIN
    public function Login()
    {

        return view('login.lLogin', [
            'title' => 'Login Admin',

        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        };
        return back()->with('statusLoginFailed', 'Username / Password Salah');
    }
    public function LoginStore(Request $request)
    {

        $validatedData = $request->validate([
            'email'     => 'required|unique:users|max:255|email:rfc,dns',
            'password'  => 'required|min:5|max:255',
        ]);
        return $validatedData;
    }

    // REGISTER---------------REGISTER-------------REGISTER
    // REGISTER---------------REGISTER-------------REGISTER
    // REGISTER---------------REGISTER-------------REGISTER
    public function Register()
    {

        return view('login.lRegister', [
            'title' => 'Registrasi',

        ]);
    }
    public function RegisterStore(Request $request)
    {

        $validatedData = $request->validate([
            'name'      => 'required|min:5|max:255',
            'username'  => 'required|unique:users|min:5|max:255',
            'email'     => 'required|unique:users|max:255|email:rfc,dns',
            'password'  => 'required|min:5|max:255',
        ]);
        $validatedData['password']          = Hash::make($validatedData['password']);
        $validatedData['avatar']            = 'avatar-petugas/avatar-default.png';
        $validatedData['level']             = 2;
        $validatedData['is_admin']          = 2;
        $validatedData['email_verified_at'] = now();

        User::create($validatedData);
        return redirect('/login')->with('statusRegister', 'Registrasi Berhasil, Silahkan Login!');
    }
    public function ForgotPassword()
    {
        return view('login.lForgot', [
            'title' => 'Registrasi',
        ]);
    }


    // LOGOUT---------------LOGOUT-------------LOGOUT
    // LOGOUT---------------LOGOUT-------------LOGOUT
    // LOGOUT---------------LOGOUT-------------LOGOUT
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
