<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id('id_berita');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('isi');
            $table->string('gambar')->nullable();
            $table->boolean('is_published')->default(false);
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('kategori_id')
                ->references('id')
                ->on('all_kategoris')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};