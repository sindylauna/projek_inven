@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5>Mengedit Data Barang Keluar</h5>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('barangkeluar.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('barangkeluar.update',$barangkeluar->id)}}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Tanggal Keluar</label>
                            <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror" name="tanggal_keluar"
                            value="{{ old('tanggal_keluar',$barangkeluar->tanggal_keluar) }}" placeholder="Tanggal Keluar" required>
                            @error('barangkeluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                            value="{{ old('jumlah',$barangkeluar->jumlah) }}" placeholder="Jumlah" required>
                            @error('barangkeluar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-2">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                            value="{{ old('keterangan',$barangkeluar->keterangan) }}" placeholder="keterangan" required>
                            @error('barangkeluar')
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