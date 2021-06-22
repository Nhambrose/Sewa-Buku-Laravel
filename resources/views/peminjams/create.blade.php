@extends('layout.master')

@section('content')
    <div classs="container">
        <h4>Tambah Peminjam</h4>
        <form method="post" action="{{ route('peminjam.store') }}">
        @csrf
            <div class="form-group">
                <label>Kode Peminjam</label>
                <input type="text" name="kode_peminjam" class="form-control">
            </div>
            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Peminjam</label>
                <select class="form-control" name="id_jenis_peminjam">
                    <option>Pilih Jenis Peminjam</option>
                        @foreach ($list_jenis_peminjam as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                        @endforeach
                </select>
            </div>
            <div><button type="submit">Simpan</button></div>
        </form>
    </div>
@endsection