@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5>barang</h5>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('pengembalian.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('pengembalian.update',$pengembalian->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <select type="text" name="barang_id" class="form-control">
                                @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->nama_barang}}</option>
                                @endforeach
                            </select>
                            <div class="mb-2">
                            <label class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam"
                            value="{{ old('nama_peminjam',$pengembalian->nama_peminjam) }}" placeholder="Tanggal Masuk" required>
                            @error('pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" name="tanggal_pengembalian"
                            value="{{ old('tanggal_pengembalian',$pengembalian->tanggal_pengembalian) }}" placeholder="Tanggal_pinjam" required>
                            @error('pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="mb-2">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                            value="{{ old('jumlah',$pengembalian->jumlah) }}" placeholder="Tanggal_pinjam" required>
                            @error('pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                            value="{{ old('keterangan',$pengembalian->keterangan) }}" placeholder="keterangan" required>
                            @error('pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        {{-- <div class="mb-2">
                            <label class="form-label">Select Role</label>
                            <select class="form-control" name="isAdmin" id="isAdmin" required>
                                <option value="0" {{old('isAdmin')==0 ? 'selected' : ''}}>barang</option>
                                <option value="1" {{old('isAdmin')==1 ? 'selected' : ''}}>Admin</option>
                            </select>
                        </div> --}}
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection