<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_export', function (Blueprint $table) {
            $table->id();
            $table->string('nama_driver');
            $table->string('nama_kendaraan');
            $table->string('jenis_kendaraan');
            $table->string('nama_persetujuan1');
            $table->string('nama_persetujuan2');
            $table->string('status_pengambalian');
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
        Schema::dropIfExists('table_export');
    }
};
