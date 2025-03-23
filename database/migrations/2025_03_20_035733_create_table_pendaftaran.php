<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nisn')->unique();
            $table->string('address');
            $table->date('Tanggal_lahir');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('asal_sekolah');
            $table->string('no_hp');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('email')->unique();
            $table->timestamps();
        });
        Schema::create('Jurusan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('Pilihan_1');
            $table->string('Pilihan_2')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
        Schema::dropIfExists('Jurusan');
    }
};
