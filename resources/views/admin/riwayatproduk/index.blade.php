@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-conten-center">
        <div class="col-12">
            <h2 class="mb-2 page-title">
                Data Riwayat Produk
            </h2>
            <div class="row my-4">
                <div class="col-md 12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <table class="table datatables table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Produk</th>
                                        <th>type</th>
                                        <th>Qty</th>
                                        <th>Note</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($riwayat))
                                        @foreach ($riwayat as $riwayatProduk)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayatProduk->produk->nama_produk }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($riwayatProduk->type == 'masuk')
                                                            <div class="badge rounded-pill bg-success w-100">{{ $riwayatProduk->type }}
                                                            </div>
                                                        @elseif ($riwayatProduk->type == 'keluar')
                                                            <div class="badge rounded-pill bg-danger w-100">{{ $riwayatProduk->type }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayatProduk->qty }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayatProduk->note }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayatProduk->created_at->format('h:i:s A') }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayatProduk->created_at->format('Y-m-d') }}
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
    </div>
</div>

@endsection