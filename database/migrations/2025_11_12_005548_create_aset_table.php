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
        Schema::create('aset', function (Blueprint $table) {
            $table->increments('aset_id');
            $table->foreignId('kategori_id')
                ->constrained('kategoriAset', 'kategori_id') 
                ->onDelete('cascade');
            $table->string('kode_aset')->unique();
            $table->string('nama_aset', 100);
            $table->date('tgl_perolehan');
            $table->decimal('nilai_perolehan', 15, 2);
            $table->enum('kondisi', ['baik', 'rusak', 'perbaikan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
