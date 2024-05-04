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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->foreign('nis')->references('nis')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nisn')->unique();
            $table->string('nama');
            $table->string('ttl');
            $table->string('nama_ortu');
            $table->enum('jk', ['P', 'L']);
            $table->enum('jurusan', ['MIPA', 'IPS']);
            $table->string('kelas');
            $table->double('nilai1', 5, 2);
            $table->double('nilai2', 5, 2);
            $table->double('nilai3', 5, 2);
            $table->double('nilai4', 5, 2);
            $table->double('nilai5', 5, 2);
            $table->double('nilai6', 5, 2);
            $table->double('nilai7', 5, 2);
            $table->double('nilai8', 5, 2);
            $table->double('nilai9', 5, 2);
            $table->double('nilai10', 5, 2);
            $table->double('nilai11', 5, 2);
            $table->double('nilai12', 5, 2);
            $table->double('nilai13', 5, 2);
            $table->double('nilai14', 5, 2);
            $table->double('nilai15', 5, 2);
            $table->double('nilai16', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
