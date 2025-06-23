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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nama_orangtua');
            $table->string('kurikulum');
            $table->text('alamat');
            $table->text('harapan')->nullable();
            $table->string('akte'); // path file akte PDF
            $table->string('kk');   // path file KK PDF
            $table->enum('status', ['pending', 'acc', 'tolak'])->default('pending');
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
