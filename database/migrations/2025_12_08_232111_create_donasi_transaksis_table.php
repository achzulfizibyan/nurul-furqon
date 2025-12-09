<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donasi_transaksis', function (Blueprint $table) {
            $table->id();

            // Relasi ke kampanye donasi
            $table->foreignId('donasi_id')
                  ->constrained('donasis')
                  ->onDelete('cascade');

            // Opsional: relasi ke user yang berdonasi
            $table->unsignedBigInteger('user_id')->nullable();

            // Nominal donasi
            $table->decimal('jumlah', 15, 2);

            // Metode pembayaran (transfer, cash, dll)
            $table->string('metode')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donasi_transaksis');
    }
};
