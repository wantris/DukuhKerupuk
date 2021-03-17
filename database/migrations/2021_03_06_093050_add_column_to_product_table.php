<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->bigInteger('product_category_id')->unsigned()->after('nama_produk');
            $table->text('deskripsi_produk')->after('product_category_id');
            $table->bigInteger('product_expired_id')->unsigned()->after('deskripsi_produk');
            $table->integer('penjualan')->after('product_expired_id');
            $table->string('status', 100)->after('penjualan');

            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('product_expired_id')->references('id')->on('product_expireds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('product_category_id');
            $table->dropColumn('deskripsi_produk');
            $table->dropColumn('product_expired_id');
        });
    }
}
