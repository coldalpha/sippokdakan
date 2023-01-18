<?php

namespace App\Http\Controllers;

use App\Models\Pokdakan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
return view('frontEnd/vData', [
        'title' => 'Data',
        'Datas' => Pokdakan::latest()
                -> where('status', '=', 'Disetujui')
                -> get()
    ]);
    }

    public function show($slug)
    {
        return view('frontEnd/vDetailData', [
        'title' => 'Data',
        'Datas' => Pokdakan::find($slug)
                -> latest()
                -> where('status', '=', 'Disetujui')
                -> get()
    ]);
    }
}
