@extends('layouts.app')
@section('content')
    {{-- <livewire:transaksi /> --}}
    <div class="flex-centerbetween mb-4">
        <h2 class="text-dark fw-bold mb-0">Transaksi</h2>
        <!-- Button trigger modalTambah -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bx bx-plus"></i> Tambah
        </button>
    </div>
    <div class="card border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class=" col-3">
                    <label for="pelanggan_id" class="form-label">ID Pelanggan</label>
                    <input type="email" class="form-control" name="pelanggan_id" id="pelanggan_id">
                </div>
                <div class="me-5">
                    <h4 class="fw-semibold">Rp. {{$detailPenjualan? $detailPenjualan->sum('subtotal') : '0'}}</h4>
                </div>
            </div>
            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                {{-- <th>Stok</th> --}}
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($detailPenjualan == '')
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Data tidak ada
                                    </td>
                                </tr>
                            @else
                                @foreach ($detailPenjualan as $item)
                                    <tr class="align-middle">
                                        {{-- <td>
                                    <img src="assets/images/dish_01.png" alt="" class="rounded object-fit-cover"
                                        width="40">
                                </td> --}}
                                        <td>1</td>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ $item->produk->harga }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <form action="" method="post"></form>
                                                <button class="btn btn-sm btn-quantity rounded-circle">
                                                    <i class="bx bx-minus"></i>
                                                </button>
                                                <p class="mb-0 text-dark">
                                                    {{$item->jumlah}}
                                                </p>
                                                <button class="btn btn-sm btn-quantity rounded-circle">
                                                    <i class="bx bx-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{ $item->subtotal }}</td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-3">
                                                
                                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="post">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-warning btn-sm py-1 px-3 rounded-1">
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
                <div class="d-flex justify-content-end gap-3 mx-4 my-3">
                    <button class="btn btn-danger">Batal</button>
                    <button class="btn btn-primary">Bayar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    {{-- <th>Jumlah</th> --}}
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataProduk == '')
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Data tidak ada
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($dataProduk as $item)
                                        <tr class="align-middle">
                                            <td>
                                                @for ($i = 0; $i < $dataProduk->count(); $i++)
                                                    {{ $i }}
                                                @endfor
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            {{-- <td class="col-2">
                                            <input type="text" class="form-control" wire:model="jumlah" value="1">
                                        </td> --}}
                                            <td>Rp. {{ $item->harga }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td class="col-2">
                                                <div class="d-flex justify-content gap-1">
                                                    <form action="{{ route('transaksi.store') }}" method="post">
                                                        @csrf
                                                        <input type="text" class="d-none" name="produk_id" id=""
                                                            value="{{ $item->id }}">
                                                        <button type="submit"
                                                            class="btn btn-warning btn-sm py-2 px-3 rounded-1">
                                                            <i class="bx bx-plus"></i>
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
        </div>
    </div>
@endsection
