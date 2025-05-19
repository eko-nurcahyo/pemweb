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
    Schema::create('pendaftarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('beasiswa_id')->constrained()->onDelete('cascade');
        $table->json('dokumen')->nullable(); // hasil upload
        $table->enum('status', ['pending', 'diterima', 'ditolak', 'revisi'])->default('pending');
        $table->text('catatan')->nullable(); // untuk catatan penolakan/revisi
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
