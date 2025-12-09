<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('file'); // path file PDF

            // Tambahkan relasi ke kategori
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('all_kategoris')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('downloads', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
        });
        Schema::dropIfExists('downloads');
    }
};
