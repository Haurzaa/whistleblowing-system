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
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('nama')->nullable(); // kalau anonim, boleh null
        $table->string('email')->nullable(); // kalau anonim, boleh null
        $table->string('jenis_laporan'); 
        $table->string('tempat_kejadian');
        $table->date('tanggal_kejadian');
        $table->text('isi_laporan'); // isi laporan
        $table->string('dokumen_pendukung')->nullable(); // file upload
        $table->string('status')->default('Pending'); // status laporan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
