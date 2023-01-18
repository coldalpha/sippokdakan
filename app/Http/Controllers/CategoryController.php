<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category){
        return view('admin/Category/vKategori',[
            'title' => 'DATA KATEGORI',
            'categories' => Category::all()
        ]);
    }
    public function createSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
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

        $validatedData = $request->validate([
            'nama' => 'required|min:5|max:25',
            'slug' => 'required|unique:categories',
            'warna' => 'required',
        ]);

        Category::create($validatedData);
        return redirect('/category')->with('suksesInput', 'Input Kategori Berhasil');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin/Category/vEditKategori',[
        'title'         => 'DATA KATEGORI',
        'categories'    => $category,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'warna'         => 'required',
        ];
        if ($request->nama != $category->nama) {
            $rules['nama'] = 'required|unique:ikans';
        }
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:ikans';
        }
        $validatedData                  = $request->validate($rules);
        $validatedData['updated_at']    = now();

        Category :: where  ('id',$category->id)
                 -> update ($validatedData);
        return redirect('/category')->with('suksesInput', 'Update Kategori Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/category')->with('suksesInput', 'Kategory Berhasil dihapus');
    }
}
