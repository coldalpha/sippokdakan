<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use App\Models\Pokdakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class IkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ikan $ikan)
    {
        return view('admin/Ikan/vIkan',[
            'title'    => 'DATA IKAN',
            'ikans'     => Ikan::all()
        ]);
    }
    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Ikan::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama'  => 'required|min:2|max:25|unique:ikans',
            'slug'  => 'required|unique:ikans',
            'warna' => 'required',
        ]);
        // return $validatedData;
        Ikan::create($validatedData);
        return redirect('/ikan')->with('suksesInput', 'Input Ikan Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function show(Ikan $ikan)
    {
        return $ikan;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ikan $ikan)
    {
        return view('admin/Ikan/vEditIkan',[
         'title'    => 'DATA IKAN',
        'ikans'     => $ikan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ikan $ikan)
    {
        // return $request;
        $rules = [
            'warna'         => 'required',
        ];
        if ($request->nama != $ikan->nama) {
            $rules['nama']  = 'required|unique:ikans';
        }
        else if ($request->slug != $ikan->slug) {
            $rules['slug']  = 'required|unique:ikans';
        }
        $validatedData                  = $request->validate($rules);
        $validatedData['updated_at']    = now();

        Ikan::where('id',$ikan->id)->update($validatedData);
        return redirect('/ikan')->with('suksesInput', 'Update Ikan Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ikan  $ikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ikan $ikan)
    {
        Ikan::destroy($ikan->id);
        return redirect('/ikan')->with('suksesInput', 'Data Berhasil dihapus');
    }
}
