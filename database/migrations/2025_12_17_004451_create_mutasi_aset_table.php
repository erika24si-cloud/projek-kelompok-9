<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mutasi_aset', function (Blueprint $table) {
            $table->increments('mutasi_id');
            $table->unsignedInteger('aset_id');
            $table->foreign('aset_id')
                  ->references('aset_id')
                  ->on('aset')
                  ->onDelete('cascade');
            $table->date('tanggal');
            $table->string('jenis_mutasi', 50);
            $table->string('keterangan', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_aset');
    }
};
