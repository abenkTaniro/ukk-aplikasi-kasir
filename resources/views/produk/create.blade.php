@extends('layouts.app')
@section('content')
      <!-- Mulai Copy -->
      <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Tambah Produk</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" autofocus>
                </div>
                <div class="mb-3">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" id="harga">
                </div>
                <div class="mb-3">
                    <label for="email">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori">
                        <option selected>Pilih Kategori</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                        <option value="snack">Snack</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" id="stok">
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