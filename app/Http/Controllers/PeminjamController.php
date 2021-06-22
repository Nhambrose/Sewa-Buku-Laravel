<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peminjam;

use App\Telepon;

use App\JenisPeminjam;

class PeminjamController extends Controller

{
    public function lihat_data_peminjam(){
        $peminjam = ['Nafi',
                        'Helmi',
                        'Aldianto'
                    ];
        return view('peminjams/lihat_data_peminjam', compact('peminjam'));
    }

    public function index(){
        $data_peminjam = Peminjam::all()->sortBy('nama_peminjam');
        $jumlah_peminjam = $data_peminjam->count();
        return view('peminjams.index', compact('data_peminjam', 'jumlah_peminjam'));
    }

    public function create(){
        $list_jenis_peminjam = JenisPeminjam::pluck('nama_jenis_peminjam','id_jenis_peminjam');
        return view('peminjams.create', compact('list_jenis_peminjam'));
    }

    public function store(Request $request){
        $peminjam = new Peminjam;
        $peminjam->id_peminjam = $request->kode_peminjam;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->tgl_lahir = $request->tgl_lahir;
        $peminjam->alamat = $request->alamat;
        $peminjam->id_jenis_peminjam = $request->id_jenis_peminjam;
        $peminjam->save();

        $telepon = new Telepon;
        $telepon->no_telp = $request->telepon;
        $peminjam->telepon()->save($telepon);
        return redirect('peminjam');
    }

    public function edit($id){
        $peminjam = Peminjam::find($id);
        if(!empty($peminjam->telepon->nomor_telepon)){
            $peminjam->nomor_telepon = $peminjam->telepon->nomor_telepon;
        }
        $list_jenis_peminjam = JenisPeminjam::pluck('nama_jenis_peminjam','id_jenis_peminjam');
        return view('peminjams.edit', compact('peminjam','list_jenis_peminjam'));
    }

    public function update(Request $request, $id){
        $peminjam = Peminjam::find($id);
        $peminjam->id_peminjam = $request->kode_peminjam;
        $peminjam->nama_peminjam = $request->nama_peminjam;
        $peminjam->tgl_lahir = $request->tgl_lahir;
        $peminjam->alamat = $request->alamat;
        $peminjam->id_jenis_peminjam= $request->id_jenis_peminjam;
        $peminjam->update();

        if($peminjam->telepon){
            if($request->filled('nomor_telepon')){
                $telepon = $peminjam->telepon;
                $telepon->no_telp = $request->input('nomor_telepon');
                $peminjam->telepon()->save($telepon);
            }
            else{
                $peminjam->telepon()->delete();
            }
        }

        else{
            if($request->filled('nomor_telepon')){
                $telepon = new Telepon;
                $telepon->no_telp = $request->nomor_telepon;
                $peminjam->telepon()->save($telepon);
            }
        }
        return redirect('peminjam');
    }

    public function destroy($id){
        $peminjam = Peminjam::find($id);
        $peminjam->delete();
        return redirect('peminjam');
    }

    public function CobaCollection(){
        $daftar = ['Nafi',
                    'Helmi',
                    'Aldianto',
                    'Nafi Helmi',
                    'Nafi Helmi Aldianto'
                ];
        $collection = collect($daftar)->map(function($nama){
            return ucwords($nama);
        });
        return $collection;
    }

    public function collection_first(){
        $collection = Peminjam::all()->first();
        return $collection;
    }

    public function collection_last(){
        $collection = Peminjam::all()->last();
        return $collection;
    }

    public function collection_count(){
        $collection = Peminjam::all();
        $jumlah = $collection->count();
        return 'Jumlah Peminjam : '.$jumlah;
    }

    public function collection_take(){
        $collection = Peminjam::all()->take(2);
        return $collection;
    }

    public function collection_pluck(){
        $collection = Peminjam::all()->pluck('nama_peminjam');
        return $collection;
    }

    public function collection_where(){
        $collection = Peminjam::all()->where('kode_peminjam', 'P0001');
        return $collection;
    }

    public function collection_wherein(){
        $collection = Peminjam::all()->wherein('kode_peminjam', ['P0001', 'P0002']);
        return $collection;
    }

    public function collection_toarray(){
        $collection = Peminjam::select('kode_peminjam', 'nama_peminjam')->take(2)->get();
        $koleksi = $collection->toArray();
        foreach($koleksi as $peminjam){
            echo $peminjam['kode_peminjam'].'-'.$peminjam['nama_peminjam'].'<br>';
        }
    }

    public function collection_tojson(){
        $data = [
            ['kode_peminjam'=> 'P0001', 'nama_peminjam' =>'Nafi'],
            ['kode_peminjam'=> 'P0002', 'nama_peminjam' =>'Helmi'],
        ];
        $collection = collect($data)->toJson();
        return $collection;
    }
}
