@extends('layouts.app')
@section('content')
    <!-- Mulai Copy -->
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Ubah Kasir</h2>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <form action="{{ route('kasir.update',$dataKasir->id) }}" method="post">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$dataKasir->name}}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$dataKasir->email}}">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Optional">
                </div>
                <div class="mb-3">
                    <label for="email">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected>Pilih Role</option>
                        <option value="kasir" @if ($dataKasir->role == 'kasir')
                            @selected(true)
                        @endif>Kasir</option>
                        <option value="admin" @if ($dataKasir->role == 'admin')
                            @selected(true)
                        @endif>Admin</option>
                    </select>
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
