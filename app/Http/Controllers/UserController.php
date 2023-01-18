<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        // $coba = DB::select(' select COUNT(`status`) as Jumlah from pokdakans where status = `disetujui` and user_id ='+$user_id );

        // return $this->$coba;
        // dd(DB::table('pokdakans')->where('user_id','=', $user_id)->count());
        return view('admin/vDetailUser',[
            'title'         => 'My Account',
            'total_post'    => DB::table('pokdakans')->where('user_id','=', $user_id)->count(),
            'Disetujui'     => DB::table('pokdakans')
                            -> where('status', '=', 'Disetujui')
                            -> where('user_id','=', $user_id)
                            -> count(),
            'Pengajuan'     => DB::table('pokdakans')
                            -> where('status', '=', 'Pengajuan')
                            -> where('user_id', '=', $user_id)->count(),
            'Ditolak'       => DB::table('pokdakans')
                            -> where('status', '=', 'Ditolak')
                            -> where('user_id','=', $user_id)->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, User $user)
    {

        // // Resize and encode to required type
        $img = Image::make($req->file('avatar'))->fit(300)->encode('jpg');

        // //Provide own name
        $name = $req->file('avatar')->hashName() . '.jpg';

        // //Put file with own name
        Storage::put($name, $img);

        // //Move file to your location
        Storage::move($name, 'avatar-petugas/' . $name);

        if ($req->email != $user->email) {
            $rules['email'] = 'required|unique:users|max:255|email:rfc,dns';
        }
        $rules = [
            'name'   => 'required|min:5|max:255',
            'avatar' => 'image|file|max:2048'
        ];
        $validatedData['id']                = auth()->user()->id;
        $validatedData['updated_at']        = now();
        $validatedData['email_verified_at'] = now();
        $validatedData                      = $req->validate($rules);

        if($req->file('avatar')){
            if($req->oldAvatar !== 'avatar-petugas/avatar-default.png')
            {
                Storage::delete($req->oldAvatar);
            }
            $validatedData['avatar'] = 'avatar-petugas/' . $name;
        }
        User::where('id',$user->id)->update($validatedData);
        return redirect('/user')->with('suksesInput', 'Update Data Akun Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Password Controll
    public function editPassword()
    {
        return view('admin.vChangePassword', [
            'title' => 'Ubah Password',
        ]);
    }
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $current_password   = $request->get('current_password');
        $password           = $request->get('password');

        if($current_password === $password){
            return redirect()->route('user.password.edit')->with('gagalUpdate', 'Password lama dan Password Baru Tidak Boleh Sama');;
        }
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);
        return redirect('/user')->with('suksesInput', 'Password Berhasil di Update');
        // return redirect()->route('user.password.edit');
    }

}
