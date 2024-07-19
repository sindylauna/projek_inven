@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5>Mengedit Data Pinjaman</h5>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('peminjaman.update',$pinjaman->id)}}" method="POST" enctype="multipart/form-data">
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
                            value="{{ old('nama_peminjam',$pinjaman->nama_peminjam) }}" placeholder="Tanggal Masuk" required>
                            @error('pinjaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam"
                            value="{{ old('tgl_pinjam',$pinjaman->tgl_pinjam) }}" placeholder="Tanggal_pinjam" required>
                            @error('pinjaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" name="tgl_kembali"
                            value="{{ old('tgl_kembali',$pinjaman->tgl_kembali) }}" placeholder="Tanggal_pinjam" required>
                            @error('pinjaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                            value="{{ old('jumlah',$pinjaman->jumlah) }}" placeholder="Tanggal_pinjam" required>
                            @error('pinjaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                            value="{{ old('keterangan',$pinjaman->keterangan) }}" placeholder="keterangan" required>
                            @error('pinjaman')
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