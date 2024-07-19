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
        Schema::create('barangkeluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->date('tanggal_keluar');
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
            
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangkeluars');
    }
};
