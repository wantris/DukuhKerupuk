<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('email', 50)->nullable()->after('username');
            $table->enum('gender', ['Laki-laki', 'Perempuan', 'Lainnya'])->nullable()->after('role');
            $table->date('birth_day')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('email');
            $table->dropColumn('gender');
            $table->dropColumn('birth_day');
        });
    }
}
