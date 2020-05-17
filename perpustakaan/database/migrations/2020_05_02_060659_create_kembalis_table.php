<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKembalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kembalis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('no_pinjam');
            $table->unsignedInteger('admin');
            $table->date('tanggal_pengembalian')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Clear', 'Kurang', 'Terlambat'])->nullable();
            $table->foreign('no_pinjam')->references('id')->on('peminjamen')->onDelete('cascade');
            $table->foreign('admin')->references('id')->on('pegawais')->onDelete('cascade');
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
        Schema::dropIfExists('kembalis');
    }
}
