<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\User;
use App\Models\Category;
use App\Models\Pokdakan;
use App\Models\Kecamatan;
use App\Models\kelompok_ikan;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontEnd/vHome', [
        'title'         => 'SIP',
        'Categories'    => Category::all(),
        'Ikans'         => Ikan::all(),
        'Kecamatans'    => Kecamatan::all(),
        'users'         => User::select('username','name')
                        -> whereNotIn('is_admin',[2])
                        -> get(),
        'Datas'         => Pokdakan::latest()
                        -> where('status', '=', 'Disetujui')
                        -> take(3)
                        -> get(),
        'Foto'          => Pokdakan::where('status', '=', 'Disetujui')->latest()->get()
    ]);
    }
    public function DataIndex(Request $request)
    {
        $id_kelompok = DB::table('pokdakans') ->select('id') ->orderByDesc('id')->limit(1)->get();
        $ikan = DB::table('kelompok_ikans')
                    -> select('ikans.nama')
                    -> leftJoin('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                    -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$id_kelompok[0]->id)
                    -> get();
        $kategori = DB::table('kelompok_kategoris')
                    -> select('categories.nama','categories.slug')
                    -> leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
                    -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$id_kelompok[0]->id)
                    -> get();
        return view('frontEnd/vData', [
            'title' => 'Data',
            'ket'   => "Semua Data",
            'Datas' => Pokdakan::select('pokdakans.nama as nama','alamat','jumlah_anggota','luas_lahan',
                          'pokdakans.updated_at','pokdakans.excerpt','total_omzet','no_hp','pokdakans.email',
                          'prestasi','longitude','latitude','photo','pokdakans.slug','status'
                          ,'users.name as nama_petugas','users.username')
                    -> leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
                    -> where('status', '=', 'Disetujui')
                    -> orderByRaw('updated_at DESC')
                    -> get(),
            'Detek' => 'Data',
            'Isi'   => 'Data',
            'ikans' => $ikan,
            'kategoris' => $kategori
        ]);
    }
    public function DataDetail(Pokdakan $Pokdakan)
    {
        return view('frontEnd/vDetailData', [
        'title' => 'Data Detail',
        'Datas' => $Pokdakan,
        'ikans' => DB::table('kelompok_ikans')
                -> select('ikans.nama')
                -> leftJoin('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                -> where('kelompok_id','=',$Pokdakan->id)
                -> get(),
        'kategoris' => DB::table('kelompok_kategoris')
                    -> select('categories.nama','categories.slug')
                    // -> select('categories.nama as kategori_nama','categories.slug as kategori_slug')
                    -> leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
                    -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$Pokdakan->id)
                    -> get()

    ]);
    }
    public function KategoriIndex(Category $category)
    {
        $result = DB::table('kelompok_kategoris')
                -> select('pokdakans.nama as nama','alamat','jumlah_anggota','luas_lahan',
                          'pokdakans.updated_at','pokdakans.excerpt','total_omzet','no_hp','pokdakans.email',
                          'prestasi','longitude','latitude','photo','pokdakans.slug','status',
                          'kecamatans.nama as kecamatan_nama','categories.nama as category_nama',
                          'categories.slug as category_slug','users.name as nama_petugas',
                          'users.username','pokdakans.id as id_kelompok')
                -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                -> leftJoin('kecamatans', 'pokdakans.kecamatan_id', '=', 'kecamatans.id')
                -> join('categories', 'kelompok_kategoris.kategori_id', '=', 'categories.id')
                -> leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
                -> where('pokdakans.status', '=', 'disetujui')
                -> where('categories.slug', '=', $category->slug)
                -> orderByRaw('pokdakans.updated_at DESC')
                -> limit(1)
                -> get();
        $ikan = DB::table('kelompok_ikans')
                    -> select('ikans.nama')
                    -> leftJoin('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                    -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$result[0]->id_kelompok)
                    -> get();
        $kategori = DB::table('kelompok_kategoris')
                    -> select('categories.nama','categories.slug')
                    -> leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
                    -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$result[0]->id_kelompok)
                    -> get();
        return view('frontEnd/vData', [
        'title' => 'Data by Kategori',
        'ket'   => "Data Kategori : $category->nama",
        'Datas' => $result,
        'Detek' => 'Kategori',
        'Isi' => $category->slug,
        'ikans' => $ikan,
        'kategoris' => $kategori
         ]);
    }
    public function IkanIndex(Ikan $ikan)
    {
        $result = DB::table('kelompok_ikans')
                -> select('pokdakans.nama as nama_kelompok','alamat','jumlah_anggota','luas_lahan',
                          'pokdakans.updated_at','excerpt','total_omzet','no_hp','pokdakans.email',
                          'prestasi','longitude','latitude','photo','pokdakans.slug','status',
                          'kecamatans.nama as kecamatan_nama','categories.nama as category_nama',
                          'categories.slug as category_slug','users.name as nama_petugas',
                          'users.username','pokdakans.id as id_kelompok','ikans.nama as ikan_nama',)
                -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                -> leftJoin('kecamatans', 'pokdakans.kecamatan_id', '=', 'kecamatans.id')
                -> join('categories', 'pokdakans.category_id', '=', 'categories.id')
                -> join('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                -> leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
                -> where('pokdakans.status', '=', 'disetujui')
                -> where('ikans.slug', '=', $ikan->slug)
                -> orderByRaw('pokdakans.updated_at DESC')
                -> limit(1)
                -> get();
        $kategori = DB::table('kelompok_kategoris')
                    -> select('categories.nama')
                    -> leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
                    -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$result[0]->id_kelompok)
                    -> get();
        return view('frontEnd/vDataIkan', [
        'title' => 'Data by Ikan',
        'ket'   => "Data Ikan : $ikan->nama",
        'Datas' => $result,
        'Detek' => 'Ikan',
        'Isi' => $ikan->slug,
        'ikans' => DB::table('kelompok_ikans')
                    -> select('ikans.nama as ikan_nama','ikans.slug as ikan_slug')
                    -> leftJoin('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                    -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$result[0]->id_kelompok)
                    -> get(),
        'kategoris' => $kategori

         ]);
    }
    public function PetugasIndex(User $petugas)
    {
        $id_kelompok = DB::table('pokdakans') ->select('id') ->orderByDesc('id')->limit(1)->get();
        $ikan = DB::table('kelompok_ikans')
                    -> select('ikans.nama')
                    -> leftJoin('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                    -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$id_kelompok[0]->id)
                    -> get();
        $kategori = DB::table('kelompok_kategoris')
                    -> select('categories.nama','categories.slug')
                    -> leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
                    -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                    -> where('kelompok_id','=',$id_kelompok[0]->id)
                    -> get();
        return view('frontEnd/vData', [
        'title' => 'Data by Petugas',
        'ket'   => "Data Petugas : $petugas->name",
        'Datas' => $petugas->pokdakans,
        'Detek' => 'Petugas',
        'Isi' => $petugas->username,
        'ikans' => $ikan,
        'kategoris' => $kategori
         ]);
    }
}
