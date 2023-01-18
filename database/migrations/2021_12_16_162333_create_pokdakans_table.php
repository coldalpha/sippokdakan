<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokdakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokdakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->timestamp('published_at')->nullable();
            $table->string('nama');
            $table->enum('status', ['Pengajuan', 'Disetujui','Ditolak']);
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('latar_belakang');
            $table->text('alamat')->nullable();
            $table->string('desa');
            $table->string('kecamatan');
            // $table->foreignId('desa_id');
            // $table->foreignId('kecamatan_id');
            $table->foreignId('ikan_id');
            $table->foreignId('category_id');
            $table->integer('jumlah_anggota')->nullable();
            $table->integer('luas_lahan')->nullable();
            $table->integer('total_omzet')->nullable();
            $table->string('no_hp');
            $table->text('email')->unique();
            $table->string('prestasi_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('lotd')->nullable();
            $table->string('latd')->nullable();
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
        Schema::dropIfExists('pokdakans');
    }
}
