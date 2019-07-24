<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKepsekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepsek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kepsek');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->integer('lama_jabatan',false);
            $table->text('alamat');
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
        Schema::dropIfExists('kepsek');
    }
}
