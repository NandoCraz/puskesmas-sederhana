@extends('adminPage.layouts.main')
@section('content')
    <a href="/master/data-obat" class=" btn btn-secondary text-decoration-none my-4">Kembali</a>
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        Tambah Data Obat
                    </h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="/master/data-obat" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_obat">Nama Obat</label>
                            <input class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
                                type="text" name="nama_obat" value="{{ old('nama_obat') }}" required autocomplete="off">
                            @error('nama_obat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jenis_obat">Jenis Obat</label>
                            <input class="form-control @error('jenis_obat') is-invalid @enderror" id="jenis_obat"
                                type="text" name="jenis_obat" value="{{ old('jenis_obat') }}" required
                                autocomplete="off">
                            @error('jenis_obat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="stok_obat">Stok Obat</label>
                            <input class="form-control @error('stok_obat') is-invalid @enderror" id="stok_obat"
                                type="number" name="stok_obat" value="{{ old('stok_obat') }}" required autocomplete="off">
                            @error('stok_obat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="harga_satuan">Harga Satuan</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        Rp.
                                    </span>
                                </div>
                                <input class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan"
                                    type="number" name="harga_satuan" value="{{ old('harga_satuan') }}" required
                                    autocomplete="off">
                            </div>
                            @error('harga_satuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                            <div class="input-group">
                                <input class="form-control selector" type="text" id="tanggal_kadaluarsa"
                                    name="tanggal_kadaluarsa" autocomplete="off" required>
                            </div>
                            @error('tanggal_kadaluarsa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4 mt-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".selector").flatpickr({
                dateFormat: "Y-m-d",
                altFormat: "Y-m-d",
                ariaDateFormat: "Y-m-d",
            });
        });
    </script>
@endsection
