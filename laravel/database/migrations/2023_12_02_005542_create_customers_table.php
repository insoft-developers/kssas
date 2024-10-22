<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('fungsi');
            $table->string('telepon');
            $table->string('email');
            $table->string('alamat');
            $table->string('lama_pemotongan');
            $table->integer('jumlah_potongan');
            $table->string('mulai_berlaku');
            $table->string('istri');
            $table->string('profile_image')->nullable();
            $table->string('reg_id')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
