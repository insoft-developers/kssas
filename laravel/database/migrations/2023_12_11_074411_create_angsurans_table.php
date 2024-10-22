<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('pinjaman_id');
            $table->integer('jumlah_pinjaman');
            $table->integer('harga_kssas');
            $table->integer('dp');
            $table->integer('harus_dibayar');
            $table->integer('periode');
            $table->integer('cicilan');
            $table->integer('jumlah_dibayar');
            $table->string('tanggal_pembayaran');
            $table->string('keterangan');
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
        Schema::dropIfExists('angsurans');
    }
}
