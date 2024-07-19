@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Data table Barang Peminjaman</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <div class="card-header">
            <div class="float-start">
                <h4 class="card-title">Data Barang peminjaman</h4>
            </div>
            <div class="float-end">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-sm btn-primary">
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1; @endphp
                        @foreach ($pinjaman as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->barang->nama_barang }}</td>
                                <td>{{ $data->nama_peminjam }}</td>
                                <td>{{ $data->tgl_pinjam }}</td>
                                <td>{{ $data->tgl_kembali }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->status }}</td>

                                <td>
                                    <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
