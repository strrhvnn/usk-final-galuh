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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tiket');
            $table->unsignedBigInteger('id_user');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('email');
            $table->integer('jumlah_kursi');
            $table->integer('total_harga');
            $table->string('status')->default('pending');
            $table->timestamps();


            $table->foreign('id_tiket')->references('id')->on('tikets')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
