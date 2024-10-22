<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('umur');
            $table->string('tanggal_pensiun');
            $table->string('tanggal_masuk_kerja');
            $table->string('telepon');
            $table->string('no_rekening');
            $table->string('status');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan_posisi');
            $table->integer('tunjangan_manajemen');
            $table->integer('tunjangan_daerah');
            $table->integer('shift_premium');
            $table->integer('tunjangan_lain');
            $table->integer('pajak_penghasilan');
            $table->integer('iuran_pensiun');
            $table->integer('jamsostek');
            $table->integer('potongan_kssas');
            $table->integer('potongan_selain_kssas');
            $table->integer('saldo_pembiayaan_lama');
            $table->integer('product_id');
            $table->integer('nilai_pengajuan');
            $table->integer('angsuran_pokok');
            $table->integer('periode');
            $table->integer('angsuran_jasa');
            $table->integer('potongan_baru');
            $table->integer('pembiayaan_lama');
            $table->integer('persentase');
            $table->integer('saldo_gaji_netto');
            $table->integer('keterangan');
            $table->integer('komentar');
            $table->string('manager');
            $table->string('ass_manager');
            $table->string('anilis');
            $table->integer('status_loan');
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
        Schema::dropIfExists('loans');
    }
}
