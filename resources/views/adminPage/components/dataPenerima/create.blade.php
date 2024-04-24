@extends('adminPage.layouts.main')
@section('content')
    <a href="/master/data-penerima" class=" btn btn-secondary text-decoration-none my-4">Kembali</a>
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        Tambah Data Penerima
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/master/data-penerima" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_instansi">Nama Instansi</label>
                            <input class="form-control @error('nama_instansi') is-invalid @enderror" id="nama_instansi"
                                type="text" name="nama_instansi" value="{{ old('nama_instansi') }}" required
                                autocomplete="off">
                            @error('nama_instansi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="alamat">Alamat</label>
                            <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" type="text"
                                name="alamat" value="{{ old('alamat') }}" required autocomplete="off">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="telepon">No. Telepon</label>
                            <input class="form-control @error('telepon') is-invalid @enderror" id="telepon" type="number"
                                name="telepon" value="{{ old('telepon') }}" required autocomplete="off">
                            @error('telepon')
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
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            }).then((result) => {
                location.reload();
            })
        </script>
    @endif
    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal
                        .stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            }).then((result) => {
                location.reload();
            })
        </script>
    @endif
@endsection
