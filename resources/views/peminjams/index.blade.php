@extends('layout.master')

@section('content')
    <div class="container">
        <h4>Data Peminjam</h2>
        <p align="right"><a href="{{ route('peminjam.create') }}" class="btn btn-primary">Tambah Peminjam</a></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Peminjam</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Peminjam</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            <tbody>
                @foreach ($data_peminjam as $peminjam)
                <tr>
                    <td>{{$peminjam->id}}</td>
                    <td>{{$peminjam->id_peminjam}}</td>
                    <td>{{$peminjam->nama_peminjam}}</td>
                    <td>{{$peminjam->tgl_lahir}}</td>
                    <td>{{$peminjam->alamat}}</td>
                    <td>{{!empty($peminjam->telepon['no_telp'])?
                            $peminjam->telepon['no_telp'] : '-'}}
                    </td>
                    <td>{{ $peminjam->jenis_peminjam[0]['nama_jenis_peminjam']}}</td>                    
                    <td><a href="{{ route('peminjam.edit', $peminjam->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td>
                        <form method="post" action="{{ route('peminjam.destroy', $peminjam->id) }}">
                        @csrf
                            <button classs="btn btn-warning btn-sm" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>

        <div class="pull-left">
            <strong>
                    Jumlah Peminjam : {{ $jumlah_peminjam}}
            </strong>
        </div>

    </div>
@endsection