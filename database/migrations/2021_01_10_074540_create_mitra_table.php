<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->bigIncrements('id_mitra');
            $table->string('nama_mitra', 100);
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('isVerified')->default(false);
            $table->string('no_tlp', 13)->unique();
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
        Schema::dropIfExists('mitra');
    }
}
