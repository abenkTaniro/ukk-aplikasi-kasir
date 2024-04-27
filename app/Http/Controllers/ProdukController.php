<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk.index',[
            'dataProduk' => Produk::count() > 0 ? Produk::orderByDesc('id')->get() : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:produks',
            'harga' => 'required|numeric',
            // 'kategori' => 'required',
            'stok' => 'required|numeric',
        ]);
        Produk::create($validate);
        return redirect()->route('produk.index')->with('pesan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('produk.update',[
            'dataProduk' => Produk::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            // 'kategori' => 'required',
            'stok' => 'required|numeric',
        ]);
        Produk::find($id)->update($validate);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::find($id)->delete();
        return redirect()->route('produk.index');
    }
}
