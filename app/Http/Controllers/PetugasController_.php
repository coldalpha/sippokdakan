<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index()
    {
        return view('admin/vUser',[
            'title'     => 'USER',
            'petugas'   => User::all()
        ]);
    }
    public function show(User $petugas)
    {
        return view('frontEnd/vPetugas', [
            'title'     => $petugas->name,
            'pokdakans' => $petugas->pokdakans,
            'users'     => $petugas->name
         ]);
    }
    public function detail()
    {
        $user_id = auth()->user()->id;
        return view('admin/vDetailUser',[
            'title'         => 'DETAIL USER',
            'total_post'    => DB::table('pokdakans')->where('user_id',$user_id)->count(),
            'Disetujui'     => DB::table('pokdakans')->where('status','Disetujui')->where('user_id',$user_id)->count(),
            'Pengajuan'     => DB::table('pokdakans')->where('status','Pengajuan')->where('user_id',$user_id)->count(),
            'Ditolak'       => DB::table('pokdakans')->where('status','Ditolak')->where('user_id',$user_id)->count()
        ]);
    }
}
