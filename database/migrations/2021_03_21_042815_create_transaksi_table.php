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
            $table->char('kd_transaksi', 10)->primary();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('mitra_id')->unsigned();
            $table->char('provinsi', 100);
            $table->char('kota', 100);
            $table->char('kode_pos', 30);
            $table->text('alamat');
            $table->char('total_harga', 15);
            $table->char('diskon', 15)->nullable();
            $table->enum('pengiriman', ['cod', 'antar']);
            $table->string('bukti_transfer')->nullable();
            $table->char('status', 100);
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('mitra_id')->references('id_mitra')->on('mitra');
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
