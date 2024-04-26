<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', isAdmin::class]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasir.index', [
            'dataKasir' => User::count() > 0 ? User::orderByDesc('id')->get() : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            'role' => 'required'
        ]);
        $validate['password'] = Hash::make($request->password);
        User::create($validate);
        return redirect()->route('kasir.index');
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
        return view('kasir.update', [
            'dataKasir' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            // 'password' => '|string',
            'role' => 'required'
        ]);
        if (!empty($request->password)) {
            $validate['password'] = Hash::make($request->password);
        } else {
            unset($validate['password']);
        }
        User::find($id)->update($validate);
        return redirect()->route('kasir.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('kasir.index');
    }
}
