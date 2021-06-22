<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPeminjam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_peminjam', function (Blueprint $table) {
            $table->id('id_jenis_peminjam');
            $table->string('nama_jenis_peminjam');
            $table->string('keterangan')
            ->references('id')->on('jenis_peminjam')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_peminjam');
    }
}
