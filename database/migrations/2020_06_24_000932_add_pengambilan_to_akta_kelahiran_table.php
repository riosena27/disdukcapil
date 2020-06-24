<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPengambilanToAktaKelahiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akta_kelahiran', function (Blueprint $table) {
            $table->string('status_pengambilan')->nullable();
            $table->dateTime('tanggal_pengambilan')->nullable();
            $table->unsignedBigInteger('operator_loket_id')->nullable();
            $table->foreign('operator_loket_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akta_kelahiran', function (Blueprint $table) {
            $table->dropColumn('status_pengambilan');
            $table->dropColumn('tanggal_pengambilan');
        });
    }
}
