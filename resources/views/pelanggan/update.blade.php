@extends('layouts.app')
@section('content')
    <!-- Mulai Copy -->
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Tambah Pelanggan</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form action="{{ route('pelanggan.update',$dataPelanggan->id) }}" method="post">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{$dataPelanggan->nama}}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="telepon">No Telepon</label>
                    <input type="number" name="telepon" class="form-control" id="telepon" value="{{$dataPelanggan->telepon}}">
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{$dataPelanggan->alamat}}</textarea>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" type="submit">
                        <i class="bx bx-save"></i> Simpan Baru
                    </button>
                    <a href="dashboard-kasir.html" class="btn btn-light">
                        <i class="bx bx-arrow-back"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- Batas Copy -->
@endsection
