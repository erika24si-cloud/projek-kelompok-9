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
        Schema::create('pemeliharaan_aset', function (Blueprint $table) {
            $table->increments('pemeliharaan_id');
            $table->unsignedInteger('aset_id');
            $table->foreign('aset_id')
                  ->references('aset_id')
                  ->on('aset')
                  ->onDelete('cascade');
            $table->date('tanggal'); 
            $table->text('tindakan'); 
            $table->decimal('biaya', 10, 2); 
            $table->string('pelaksana', 150); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_aset');
    }
};
