<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('poliklinik');
            $table->string('dokter');
            $table->enum('jaminan', ['umum', 'asuransi']);
            $table->date('tanggal_booking');
            $table->string('jam_praktek');
            $table->string('jam_kedatangan');
            $table->text('keluhan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
}
