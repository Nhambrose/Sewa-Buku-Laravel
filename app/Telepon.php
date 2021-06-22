<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = 'telephones';
    protected $primaryKey = 'id_peminjam';
    protected $fillable = ['id_peminjam', 'nomor_telepon'];

    public function peminjam(){
        return $this->belongsTo('App\peminjam', 'id_mahasiswa');
    }
}
