 @extends('layouts.admin')
@section('content')                    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5>Pengembalian</h5>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('pengembalian.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('pengembalian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <select name="barang_id" class="form-select">
                                <option value=""disabled selected>Pilih Barang</option>
                                @forelse($barang as $data)

                                <option value="{{$data->id}}" @error('barang_id') is-invalid @enderror>
                                    {{$data->nama_barang}}
                                </option>
                                @empty
                                @enderror
                            </select>

                            @error('barang_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" name="nama_peminjam"
                            placeholder="nama_peminjam" required>
                            @error('nama_peminjam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" name="tanggal_pengembalian"
                            placeholder="tanggal_pengembalian" required>
                            @error('tanggal_pengembalian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                            placeholder="jumlah" required>
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                            placeholder="status" required>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       
                        {{-- <div class="mb-2">
                            <label class="form-label">Select Role</label>
                            <select class="form-control" name="isAdmin" id="isAdmin" required>
                                <option value="0" {{old('isAdmin')==0 ? 'selected' : ''}}>User</option>
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