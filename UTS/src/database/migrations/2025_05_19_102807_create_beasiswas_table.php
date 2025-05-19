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
    Schema::create('beasiswas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->text('deskripsi')->nullable();
        $table->string('jenis'); // contoh: akademik, non-akademik
        $table->integer('kuota');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->json('dokumen_wajib')->nullable(); // ["KTP", "KHS"]
        $table->boolean('aktif')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswas');
    }
};
