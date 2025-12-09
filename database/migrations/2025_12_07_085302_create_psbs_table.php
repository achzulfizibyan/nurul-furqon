<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('psbs', function (Blueprint $table) {
            $table->id();

            // Akun Pendaftaran
            $table->string('email')->unique();
            $table->string('no_hp');

            // Biodata Peserta Didik
            $table->string('nama');
            $table->string('nisn', 10);
            $table->string('no_kk', 16);
            $table->string('nik', 16);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);

            // Alamat
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kode_pos', 5);
            $table->string('detail_alamat');

            // Rencana Pendidikan
            $table->string('jenjang');
            $table->string('program_tambahan')->nullable();
            $table->text('motivasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psbs');
    }
};