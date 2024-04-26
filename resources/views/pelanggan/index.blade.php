@extends('layouts.app')
@section('content')
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Data Pelanggan</h2>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Pelanggan
        </a>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            {{-- <th>Gambar</th> --}}
                            <th>Nama</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($dataPelanggan == '')
                            <tr>
                                <td colspan="6" class="text-center">
                                    Data tidak ada
                                </td>
                            </tr>
                        @else
                            @foreach ($dataPelanggan as $item)
                                <tr class="align-middle">
                                    {{-- <td>
                                        <img src="assets/images/dish_01.png" alt="" class="rounded object-fit-cover"
                                            width="40">
                                    </td> --}}
                                    <td>{{ $item->nama }}</td>
                                    <td>{{$item->telepon}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td class="col-2">
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('pelanggan.edit', $item->id) }}" class="btn btn-warning btn-sm py-1 px-3 rounded-1 text-white">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('pelanggan.destroy', $item->id) }}" method="post">
                                                @csrf @method('DELETE')
                                            <button class="btn btn-light btn-sm py-1 px-3 rounded-1">
                                                <i class="bx bx-trash"></i> Hapus
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
