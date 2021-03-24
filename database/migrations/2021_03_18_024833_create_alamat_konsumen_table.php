<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatKonsumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_konsumen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nama_lengkap', 100);
            $table->bigInteger('user_id')->unsigned();
            $table->char('nomor_telp', 30);
            $table->integer('province_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->char('kode_pos', 15);
            $table->char('latitude', 100)->nullable();
            $table->char('longitude', 100)->nullable();
            $table->text('alamat_detail');
            $table->tinyInteger('is_featured');
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_konsumen');
    }
}
