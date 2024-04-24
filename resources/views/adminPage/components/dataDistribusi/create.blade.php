@extends('adminPage.layouts.main')
@section('content')
    <a href="/master/data-distribusi" class=" btn btn-secondary text-decoration-none my-4">Kembali</a>
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        Tambah Data Distribusi
                    </h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="/master/data-distribusi">
                        @csrf
                        <div class="mb-4">
                            <label for="penerima">Penerima</label>
                            <select class="form-control" id="penerima" name="id_penerima">
                                <option value="">Pilih Penerima</option>
                                @foreach ($penerimas as $penerima)
                                    <option value="{{ $penerima->id }}">{{ $penerima->nama_instansi }}</option>
                                @endforeach
                            </select>
                            @error('id_penerima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="obat">Obat</label>
                            <select class="form-control" id="obat" name="id_obat">
                                <option value="">Pilih Obat</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                                @endforeach
                            </select>
                            @error('id_obat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_terima">Tanggal Terima</label>
                            <div class="input-group">
                                <input class="form-control selector" type="text" id="tanggal_terima"
                                    name="tanggal_terima" autocomplete="off" required>
                            </div>
                            @error('tanggal_terima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_terima">Jumlah Terima</label>
                            <input class="form-control @error('jumlah_terima') is-invalid @enderror" id="jumlah_terima"
                                type="number" name="jumlah_terima" value="{{ old('jumlah_terima') }}" required
                                autocomplete="off">
                            @error('jumlah_terima')
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
