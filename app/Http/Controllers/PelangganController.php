<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
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
        return view('pelanggan.index',[
            'dataPelanggan' => Pelanggan::count() > 0 ? Pelanggan::orderByDesc('id')->get() : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:pelanggans',
            'telepon' => 'required|max:13',
            'alamat' => 'required',
        ]);
        Pelanggan::create($validate);
        return redirect()->route('pelanggan.index');
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
        return view('pelanggan.update',[
            'dataPelanggan' => Pelanggan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'telepon' => 'required|max:13',
            'alamat' => 'required',
        ]);
        Pelanggan::find($id)->update($validate);
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelanggan::find($id)->delete();
        return redirect()->route('pelanggan.index');
    }
}
