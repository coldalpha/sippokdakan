<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/petugas/vPetugas',[
        'title'     => 'Petugas',
        'petugas'   => User::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/petugas/vTambahPetugas',[
            'title' => 'TAMBAH USER',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required|min:5|max:255',
            'username'  => 'required|unique:users|min:5|max:255',
            'email'     => 'required|unique:users|max:255|email',
            'password'  => 'required|min:5|max:255',
            'level'     => 'required',
            'is_admin'  => 'required'
        ]);
        $validatedData['password']          = Hash::make($validatedData['password']);
        $validatedData['email_verified_at'] = now();
        $validatedData['avatar']            = 'avatar-petugas/avatar-default.png';

        User::create($validatedData);
        return redirect('/petugas')->with('suksesInput', 'Registrasi Berhasil, Silahkan Login!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response0
     */
    public function show($id)
    {

    }
 public function detail()
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = DB::table('users')->where('id','=', $id)->get();
        // dd($petugas[0]);
        return view('admin/petugas/vEditPetugas',[
            'title'     => 'EDIT USER',
            'petugas'   => $petugas[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $username = $request->username;
        $user = DB::table('users')->where('username','=', $username)->get();
        $validatedData = $request->validate([
            'name'      => 'required|min:5|max:255',
            'level'     => 'required',
            'is_admin'  => 'required'
        ]);
        if ($request->email !=  $user[0]->email) {
            $validatedData   =  $request->validate([
                'email'      => 'required|unique:users|max:255|email'
            ]);

        }
        if ($request->password) {
            $validatedData  =  $request->validate([
                'password'  => 'required|min:5|max:255'
            ]);
            $validatedData['password']      = Hash::make($validatedData['password']);
        }
        $validatedData['updated_at']    = now();

        user::where('id',$user[0]->id)->update($validatedData);
        return redirect('/petugas')->with('suksesInput', 'Update user Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $namaPetugas    = DB::table('users')->where('id','=', $id)->get('name');
        $nama           = $namaPetugas[0]->name;
        $totalPost      = DB::table('pokdakans')->where('user_id','=', $id)->count();

        if ($totalPost == 0) {
            User::destroy($id);
            return redirect('/petugas')->with('suksesInput', 'Data berhasil dihapus!');
        } else {
            return redirect('/petugas')->with('gagalUpdate', 'Terdapat '.$totalPost.' Data , Dari Petugas '.$nama.', Tidak diperbolehkan Hapus User!');
        }
    }


}
