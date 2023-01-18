<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.vChangePassword', [
            'title' => 'Ubah Password',
        ]);
    }
    public function update(UpdatePasswordRequest $request)
    {
        $current_password   = $request->get('current_password');
        $password           = $request->get('password');
        
        if($current_password===$password){
            return redirect()->route('user.password.edit')->with('gagalUpdate', 'Password lama dan Password Baru Tidak Boleh Sama');;
        }

        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);
        
        return redirect('/user')->with('suksesInput', 'Password Berhasil di Update');
        
    }
}
