<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKadisToAktaKelahiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akta_kelahiran', function (Blueprint $table) {
            $table->string('status_kadis')->nullable();
            $table->text('review_kadis')->nullable();
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
            $table->dropColumn('status_kadis');
            $table->dropColumn('review_kadis');
        });
    }
}
