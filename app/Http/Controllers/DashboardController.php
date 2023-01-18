<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\User;
use App\Models\Category;
use App\Models\Pokdakan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    public function index(Request $request){

        // Cek status Akun
        $is_admin = auth()->user()->is_admin;
        if ($is_admin === 0) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('statusLoginFailed', 'Status Akun Nonaktif, Hubungi Admin');;
        }
        if ($is_admin === 2) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('statusLoginPending', 'Status Akun Pengajuan, Hubungi Admin');;
        }
        else{
            return view('admin/vDashboard',[
                        'title'                 => 'DASHBOARD ',
                        'JumlahDataKelompok'    => Pokdakan::count(),
                        'JumlahDataMenunggu'    => count(Pokdakan::all()->where('status','Pengajuan')),
                        'JumlahPetugas'         => User::count(),
                        'JumlahPetugasAktif'    => User::where('is_admin','=',1)->count(),
                        'Categories'            => Category::all(),
                        'Ikans'                 => Ikan::all(),
                        'Kecamatans'            => Kecamatan::all(),

            ]);
        }


    }
    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pokdakan::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
