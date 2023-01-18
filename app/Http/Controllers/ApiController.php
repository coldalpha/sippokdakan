<?php

namespace App\Http\Controllers;

use App\Models\kelompok_ikan;
use App\Models\kelompok_kategori;
use App\Models\Pokdakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function ViewMarker()
    {
        $Data1 = DB::select("select p.nama as nama_kelompok,  p.alamat, k.nama as kecamatan_nama,
                p.jumlah_anggota, p.luas_lahan, p.total_omzet, p.no_hp, p.email, p.prestasi, p.longitude, p.latitude,
                i.nama as ikan_nama , c.nama as category_nama , u.name as User_nama, p.status, p.slug, i.warna, p.photo
                from ikans i,categories c,pokdakans p, users u, kecamatans k
                where i.id = p.ikan_id and c.id = p.category_id and u.id = p.user_id and k.id = p.kecamatan_id and p.status = 'Disetujui'");
        return $Data1;
    }
    public function ViewMarkerIkan()
    {
        $result = kelompok_ikan::select('pokdakans.nama as nama_kelompok','alamat','jumlah_anggota','luas_lahan',
        'total_omzet','no_hp','pokdakans.email','prestasi','longitude','latitude','photo','pokdakans.slug','status'
        ,'kecamatans.nama as kecamatan_nama',
        'users.name as user_nama','pokdakans.id as id_kelompok','ikans.nama as ikan_nama','ikans.slug as ikan_slug','ikans.warna')
        ->leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
        ->leftJoin('kecamatans', 'pokdakans.kecamatan_id', '=', 'kecamatans.id')
        ->join('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
        ->leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
        ->where('pokdakans.status', '=', 'disetujui')
        ->get()->toArray();

        return $result;
    }
    public function ViewMarkerKategori()
    {
        $result = kelompok_kategori::select('pokdakans.nama as nama_kelompok','alamat','jumlah_anggota','luas_lahan',
        'total_omzet','no_hp','pokdakans.email','prestasi','longitude','latitude','photo',
        'pokdakans.slug','status',
        'kecamatans.nama as kecamatan_nama',
        'categories.nama as category_nama','categories.warna',
        'users.name as user_nama',
        'pokdakans.id as id_kelompok')
        ->leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
        ->leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
        ->leftJoin('kecamatans', 'pokdakans.kecamatan_id', '=', 'kecamatans.id')
        ->leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
        ->where('pokdakans.status', '=', 'disetujui')
        ->get()->toArray();
        return $result;
    }
    public function getDesa()
    {
        $Data = DB::select("select d.id as desa_id ,k.id as kecamatan_id, d.nama as Desa , k.nama as kecamatan from  desas d, kecamatans k
        where k.id = d.kecamatan_id");

        return $Data;
    }
    public function getKelompok()
    {
       $Data = DB::select("select p.nama as nama_kelompok, u.name as Petugas,  p.alamat,
                p.jumlah_anggota, p.luas_lahan, p.total_omzet, p.no_hp, p.email, p.prestasi, p.longitude, p.latitude,
                i.nama as ikan_nama , c.nama as category_nama , p.status
                from ikans i,categories c,pokdakans p, users u
                where i.id = p.ikan_id and c.id = p.category_id and u.id = p.user_id and p.status = 'Disetujui'");

        return $Data;
    }
    public function getData()
    {
       $Data = DB::select("select p.slug, p.nama as nama_kelompok, p.status, p.photo,
       p.updated_at, p.excerpt,
                u.name as petugas,u.username as username
                from pokdakans p, users u
                where u.id = p.user_id and p.status = 'Disetujui' ORDER BY p.updated_at DESC");

        return $Data;
    }
    public function getDataByKategori($slug_category)
    {
    //    $Data = DB::select("select p.slug, p.nama as nama_kelompok, p.status, p.photo, p.updated_at, p.excerpt,
    //             u.name as petugas,u.username as username,
    //             i.nama as ikan_nama , i.slug as slug_ikan,
    //             c.nama as category_nama, c.slug as slug_category
    //             from ikans i,categories c,pokdakans p, users u
    //             where i.id = p.ikan_id and c.id = p.category_id and u.id = p.user_id and p.status = 'Disetujui' and c.slug = '$slug_category' ORDER BY p.updated_at DESC");

    //     return $Data;
        $result = kelompok_kategori::select('pokdakans.nama as nama_kelompok','alamat','jumlah_anggota','luas_lahan',
        'total_omzet','no_hp','pokdakans.email','prestasi','longitude','latitude','photo',
        'pokdakans.slug','status','pokdakans.updated_at',
        'kecamatans.nama as kecamatan_nama',
        'categories.nama as category_nama','categories.warna',
        'users.name as petugas',
        'pokdakans.id as id_kelompok')
        ->leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
        ->leftJoin('categories', 'categories.id', '=', 'kelompok_kategoris.kategori_id')
        ->leftJoin('kecamatans', 'pokdakans.kecamatan_id', '=', 'kecamatans.id')
        ->leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
        ->where('pokdakans.status', '=', 'disetujui')
        ->where('categories.slug', '=', $slug_category)
        ->get()->toArray();
        return $result;
    }
    public function getDataByIkan($slug_ikan)
    {
       $Data = DB::select("select p.slug, p.nama as nama_kelompok, p.status, p.photo, p.updated_at, p.excerpt,
                u.name as petugas,u.username as username,
                i.nama as ikan_nama , i.slug as slug_ikan,
                c.nama as category_nama, c.slug as slug_category
                from ikans i,categories c,pokdakans p, users u
                where i.id = p.ikan_id and c.id = p.category_id and u.id = p.user_id and p.status = 'Disetujui' and i.slug = '$slug_ikan' ORDER BY p.updated_at DESC");

        // return $Data;
        $result = DB::table('kelompok_ikans')
        ->select('pokdakans.nama as nama_kelompok','alamat','jumlah_anggota','luas_lahan','pokdakans.updated_at','excerpt',
        'total_omzet','no_hp','pokdakans.email','prestasi','longitude','latitude','photo','pokdakans.slug','status',
        'kecamatans.nama as kecamatan_nama',
        'categories.nama as category_nama','categories.slug as category_slug',
        'users.name as nama_petugas','users.username',
        'pokdakans.id as id_kelompok',
        'ikans.nama as ikan_nama','ikans.slug as ikan_slug')
        ->leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
        ->leftJoin('kecamatans', 'pokdakans.kecamatan_id', '=', 'kecamatans.id')
        ->join('categories', 'pokdakans.category_id', '=', 'categories.id')
        ->join('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
        ->leftJoin('users', 'pokdakans.user_id', '=', 'users.id')
        ->where('pokdakans.status', '=', 'disetujui')
        ->where('ikans.slug', '=', $slug_ikan)
        ->orderByRaw('pokdakans.updated_at DESC')
        ->get();
        return $result;
    }
    public function getDataByPetugas($username)
    {
       $Data = DB::select("select p.slug, p.nama as nama_kelompok, p.status, p.photo, p.updated_at, p.excerpt,
                u.name as petugas,u.username as username
                from pokdakans p, users u
                where u.id = p.user_id and p.status = 'Disetujui' and u.username = '$username' ORDER BY p.updated_at DESC");

        return $Data;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
