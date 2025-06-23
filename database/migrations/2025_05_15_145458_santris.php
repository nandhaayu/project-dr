<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santris', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pendaftar_id')->nullable();
        $table->string('nama');
        $table->string('nik');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->string('no_hp');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('nama_orangtua');
        $table->string('kurikulum');
        $table->text('alamat');
        $table->text('harapan')->nullable();
        $table->string('akte');
        $table->string('kk');
        $table->date('tanggal_masuk')->default(now());
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
