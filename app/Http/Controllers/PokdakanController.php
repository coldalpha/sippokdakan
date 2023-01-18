<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Ikan;
use App\Models\Category;
use App\Models\Pokdakan;
use App\Models\Kecamatan;
use App\Models\kelompok_ikan;
use App\Models\kelompok_kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PokdakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index(){
        if (auth()->user()->level === 2) {

            return view('admin/kelompok/vKelompok',[
                'title'         => 'KELOMPOK',
                'pokdakans'     => Pokdakan::where('user_id',auth()->user()->id)->orderBy('updated_at','asc')->get(),
                'pokdakanss'    => Pokdakan::latest()
                                            ->where('status', '=', 'Disetujui')
                                            ->where('user_id', '=', auth()->user()->id)
                                            ->get()
            ]);
            // DB::table('pokdakans')->orderBy('updated_at','desc')->get(),
        }else {
            return view('admin/kelompok/vKelompok',[
                'title'         => 'KELOMPOK',
                'pokdakans'     => Pokdakan::latest()->get(),
                'pokdakanss'    => Pokdakan::latest()
                                            ->where('status', '=', 'Disetujui')
                                            ->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/kelompok/vTambahDataKelompok',[
            'title'         => 'DATA KELOMPOK',
            'Ikans'         => Ikan::pluck('nama','id'),
            'Categories'    => Category::pluck('nama','id'),
            'Desas'         => Desa::all(),
            'Kecamatans'    => Kecamatan::pluck('nama','id')
        ]);
    }
    public function findDesa(Request $request)
    {
        $data=Desa::select('nama','id')->where('kecamatan_id',$request->id)->get();
        return response()->json($data);
    }
    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pokdakan::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('photo')->store('pokdakan-photo');
        // $ikan =  $request->get('ikan_id');
        // return $request;
        // $id_kelompok1= Pokdakan::pluck('nama','id'),

        // die();
        $validatedData = $request->validate([
            'nama'              => 'required|min:5|max:255',
            'slug'              => 'required|unique:pokdakans',
            'latar_belakang'    => 'required|min:50',
            'alamat'            => 'required|min:10',
            'desa_id'           => 'required',
            'kecamatan_id'      => 'required',
            // 'ikan_id'           => 'required',
            // 'category_id'       => 'required',
            'jumlah_anggota'    => 'required|min:1',
            'luas_lahan'        => 'required|min:1',
            'total_omzet'       => 'required|min:1',
            'no_hp'             => 'required|min:5|max:16',
            'email'             => 'required|email:rfc,dns',
            'longitude'         => 'required',
            'latitude'          => 'required',
            'prestasi'          => 'required',
            'photo'             => 'image|file|max:2048',
        ]);
        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('pokdakan-photo');
        }

        $validatedData['updated_at']    = now();
        $validatedData['status']        = 'Pengajuan';
        $validatedData['user_id']       = auth()->user()->id;
        $validatedData['excerpt']       = Str::limit(strip_tags($request->latar_belakang),50);

        Pokdakan::create($validatedData);
        $id_kelompok = DB::table('pokdakans') ->select('id') ->orderByDesc('id')->limit(1)->get();
        if($ikan = $request->ikan_id){
                    foreach($ikan as $value){
                       DB::table('kelompok_ikans')->insert(
                            ['kelompok_id' => $id_kelompok[0]->id, 'ikan_id' => $value]
                );
            }
        }
        if($kategori = $request->category_id){
                    foreach($kategori as $value){
                       DB::table('kelompok_kategoris')->insert(
                            ['kelompok_id' => $id_kelompok[0]->id, 'kategori_id' => $value]
                );
            }
        }

        return redirect('/pokdakan')->with('suksesInput', 'Tambah Data Berhasil, Silahkan Tunggu Review Administrator !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokdakan  $pokdakan
     * @return \Illuminate\Http\Response
     */
    public function show(Pokdakan $pokdakan)
    {
        // return $pokdakan;
        // return view('admin.vDetailKelompok');
        return view('admin.kelompok.vDetailKelompok',[
            'title'      => 'DETAIL',
            'pokdakan'   => $pokdakan,
            'ikans'      => kelompok_ikan::select('ikans.nama')
                         -> leftJoin('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                         -> leftJoin('pokdakans', 'kelompok_ikans.kelompok_id', '=', 'pokdakans.id')
                         -> where('kelompok_id','=',$pokdakan->id)
                         -> get(),
            'kategoris'  => kelompok_kategori::select('categories.nama')
                         -> leftJoin('categories', 'kelompok_kategoris.kategori_id', '=', 'categories.id')
                         -> leftJoin('pokdakans', 'kelompok_kategoris.kelompok_id', '=', 'pokdakans.id')
                         -> where('kelompok_id','=',$pokdakan->id)
                         -> get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokdakan  $pokdakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokdakan $pokdakan)
    {
        $id_kelompok    = $pokdakan["id"];
        $ikan           =  kelompok_ikan:: where('kelompok_id','=',$id_kelompok)
                        -> select('ikan_id')
                        -> join('ikans', 'kelompok_ikans.ikan_id', '=', 'ikans.id')
                        -> get();
        foreach($ikan as $value){ $jenis_ikan[] = $value->ikan_id; }
        $kategori        =  kelompok_kategori:: where('kelompok_id','=',$id_kelompok)
                        -> select('kategori_id')
                        -> leftJoin('categories', 'kelompok_kategoris.kategori_id', '=', 'categories.id')
                        -> get();
        foreach($kategori as $value){ $jenis_kategori[] = $value->kategori_id; }
        $id_desa         = $pokdakan["desa_id"];
        $id_kecamatan    = $pokdakan["kecamatan_id"];
        $nama_desa       = Desa::where('id','=',$id_desa)->get('nama');

        return view('admin.kelompok.vEditDataKelompok',[
            'title'         => 'EDIT',
            'pokdakan'      => $pokdakan,
            'Ikans'         => Ikan::pluck('nama','id'),
            'Categories'    => Category::pluck('nama','id'),
            'Kecamatans'    => Kecamatan::pluck('nama','id'),
            'Desas'         => Desa::where('kecamatan_id','=',$id_kecamatan)
                            ->pluck('nama','id'),
            'id_desa'       => $id_desa,
            'nama_desa'     => $nama_desa[0]['nama'],
            'id_kecamatan'  => $id_kecamatan,
            'ikans_id'      => $jenis_ikan,
            'kategoris_id'  => $jenis_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokdakan  $pokdakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokdakan $pokdakan)
    {
        // return $request;
        // return $request->file('photo')->store('pokdakan-photo');
        $rules = [
            'nama'              => 'required|min:5|max:255',
            'latar_belakang'    => 'required|min:50',
            'alamat'            => 'required|min:10',
            'desa_id'           => 'required',
            'kecamatan_id'      => 'required',
            'jumlah_anggota'    => 'required|min:1',
            'luas_lahan'        => 'required|min:1',
            'total_omzet'       => 'required|min:1',
            'no_hp'             => 'required|min:5|max:16',
            'email'             => 'required|email:rfc,dns',
            'longitude'         => 'required',
            'latitude'          => 'required',
            'prestasi'          => 'required',
            'photo'             => 'image|file|max:2048',
        ];

        if ($request->slug != $pokdakan->slug) {
            $rules['slug'] = 'required|unique:pokdakans';
        }
        $validatedData = $request->validate($rules);
        if($request->file('photo')){
            if($request->oldPhoto !== 'pokdakan-photo/default.png')
            {
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('pokdakan-photo');
        }
        $validatedData['status']        = 'Pengajuan';
        $validatedData['user_id']       = auth()->user()->id;
        $validatedData['excerpt']       = Str::limit(strip_tags($request->latar_belakang),50);
        $validatedData['updated_at']    = now();

        Pokdakan::where('id',$pokdakan->id)->update($validatedData);
        if($ikan = $request->ikan_id){
                kelompok_ikan::where('kelompok_id','=',$pokdakan->id)->delete();
                    foreach($ikan as $value){
                       DB::table('kelompok_ikans')->insert(
                            ['kelompok_id' => $pokdakan->id, 'ikan_id' => $value]
                );
            }
        }
        if($kategori = $request->category_id){
                kelompok_kategori::where('kelompok_id','=',$pokdakan->id)->delete();
                    foreach($kategori as $value){
                       DB::table('kelompok_kategoris')->insert(
                            ['kelompok_id' => $pokdakan->id, 'kategori_id' => $value]
                );
            }
        }
        return redirect('/pokdakan')->with('suksesInput', 'Update Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokdakan  $pokdakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokdakan $pokdakan)
    {
        if($pokdakan->oldPhoto)
            {
                Storage::delete($pokdakan->oldPhoto);
            }
        Pokdakan::destroy($pokdakan->id);
        kelompok_ikan::where('kelompok_id','=',$pokdakan->id)->delete();
        return redirect('/pokdakan')->with('suksesInput', 'Data berhasil dihapus!');
    }
    public function Setujui($slug)
    {
        $validatedData['status'] = 'Disetujui';
        Pokdakan :: where('slug',$slug)
                 -> update($validatedData);
        return redirect('/pokdakan')->with('suksesInput', 'Update Data Berhasil');
    }
    public function Tolak($slug)
    {
        $validatedData['status'] = 'Ditolak';
        Pokdakan :: where('slug',$slug)
                 -> update($validatedData);
        return redirect('/pokdakan')->with('suksesInput', 'Update Data Berhasil');
    }
}
