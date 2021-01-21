<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('kd_transaksi');
            $table->integer('jumlah_bayar');
            $table->dateTime('tanggal_transaksi',0);
            $table->string('bukti_bayar',100);
            $table->unsignedBigInteger('kd_pesanan');
            $table->foreign('kd_pesanan')->references('kd_pesanan')->on('pesanan');
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
        Schema::dropIfExists('transaksi');
    }
}
