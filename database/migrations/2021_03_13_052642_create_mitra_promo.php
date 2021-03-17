<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitraPromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra_promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->bigInteger('mitra_id')->unsigned();
            $table->enum('tipe_promo', ['promo-toko', 'promo-produk']);
            $table->string('nama_promo', 100);
            $table->string('kode_voucher', 25);
            $table->date('start_date');
            $table->date('end_date');
            $table->char('tipe_diskon', 50);
            $table->char('jumlah_diskon', 20);
            $table->integer('kuota');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('product_id')->references('id_produk')->on('produk');
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
        Schema::dropIfExists('mitra_promos');
    }
}
