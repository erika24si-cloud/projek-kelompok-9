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
        Schema::create('lokasi_aset', function (Blueprint $table) {
             $table->increments('lokasi_id');
            $table->unsignedInteger('aset_id'); 
            $table->foreign('aset_id')
            ->references('aset_id')
            ->on('aset')
            ->onDelete('cascade');
           $table->string('keterangan', 255);
            $table->text('lokasi_text');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_aset');
    }
};
