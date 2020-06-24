<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktaKelahiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akta_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('no_resi');
            $table->text('tempat_kelahiran');
            $table->text('kelahiran');
            $table->char('nomor_kk', 16)->nullable();
            $table->text('nama_anak');
            $table->text('tanggal_lahir');
            $table->string('penolong_kelahiran');
            $table->text('nama_kepala_keluarga');
            $table->string('jenis_kelamin');
            $table->string('waktu_lahir');
            $table->float('berat_bayi');
            $table->string('no_hp');
            $table->string('tempat_dilahirkan');
            $table->string('jenis_kelahiran');
            $table->float('tinggi_bayi');
            $table->string('warga_negara');
            $table->char('nik_ayah', 16)->nullable();
            $table->text('pekerjaan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();
            $table->text('nomor_surat_kawin')->nullable();
            $table->text('nama_ayah')->nullable();
            $table->string('warga_negara_ayah')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->char('nik_ibu', 16)->nullable();
            $table->text('pekerjaan_ibu');
            $table->text('agama');
            $table->text('nama_ibu');
            $table->string('warga_negara_ibu');
            $table->string('tanggal_perkawinan')->nullable();
            $table->char('nik_saksi_1', 16)->nullable();
            $table->integer('umur_saksi_1');
            $table->text('alamat_saksi_1');
            $table->char('nik_saksi_2', 16)->nullable();
            $table->integer('umur_saksi_2')->nullable();
            $table->text('alamat_saksi_2')->nullable();
            $table->text('nama_saksi_1');
            $table->text('pekerjaan_saksi_1');
            $table->text('nama_saksi_2')->nullable();
            $table->text('pekerjaan_saksi_2')->nullable();
            $table->text('surat_keterangan_lahir');
            $table->text('kartu_keluarga');
            $table->text('keterangan_akta_orang_tua');
            $table->text('sptjm_pasutri')->nullable();
            $table->text('keterangan_permohonan_kelahiran');
            $table->text('sptjm_kebenaran_kelahiran');
            $table->text('keterangan_anak_kawin');
            $table->text('pernyataan_saksi');
            $table->text('ktp_saksi_balikpapan');
            $table->text('surat_kuasa');
            $table->text('fotocopy_akta_anak');
            $table->string('status_operator')->nullable();
            $table->text('review_operator')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status_kasie')->nullable();
            $table->text('review_kasie')->nullable();
            $table->unsignedBigInteger('kasie_id')->nullable();
            $table->foreign('kasie_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status_kabid')->nullable();
            $table->text('review_kabid')->nullable();
            $table->unsignedBigInteger('kabid_id')->nullable();
            $table->foreign('kabid_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('akta_kelahiran');
    }
}
