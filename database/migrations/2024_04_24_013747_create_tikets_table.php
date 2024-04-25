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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('no_penerbangan');
            $table->string('nama_maskapai');
            $table->string('dari_bandara');
            $table->string('tujuan_bandara');
            $table->date('tanggal_keberangkatan');
            $table->time('jam_pergi');
            $table->time('jam_sampai');
            $table->integer('jumlah_kursi');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
