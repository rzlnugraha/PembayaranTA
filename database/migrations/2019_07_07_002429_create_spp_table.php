<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSppTable extends Migration
{
    public function up()
    {
        Schema::create('spp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_angkatan',false);
            $table->unsignedInteger('id_siswa',false);
            $table->enum('bulan',[
                'januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'
            ]);
            $table->enum('status_spp',['lunas','belum lunas','masih kurang']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spp');
    }
}
