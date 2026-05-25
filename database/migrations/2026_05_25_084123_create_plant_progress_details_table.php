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
        Schema::create('plant_progress_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('plant_progress_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('hari');

            $table->enum('kategori', [
                'kondisi',
                'pupuk_dasar',
                'pupuk_majemuk',
                'nutrisi',
                'panen'
            ]);

            $table->enum('kondisi', [
                'bagus',
                'sedang',
                'kurang_baik'
            ])->nullable();

            $table->text('keterangan')->nullable();

            $table->string('gambar')->nullable();

            $table->date('tanggal')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_progress_details');
    }
};