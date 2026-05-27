<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id('id_penelitian');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('judul');
            $table->string('anggota');
            $table->string('tema');
            $table->integer('tahun');
            $table->string('hibah');
            $table->string('luaran');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penelitian');
    }
};