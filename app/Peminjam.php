<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjams';

    public function telepon(){
        return $this->hasOne(Telepon::class, 'id_peminjam');
    }

    public function jenis_peminjam(){
        return $this->hasMany(JenisPeminjam::class, 'id_jenis_peminjam','id_jenis_peminjam');
    }
}
