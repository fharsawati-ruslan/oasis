<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receipt_transaction_documents', function (Blueprint $table) {

            $table->id();

            $table->foreignId('receipt_transaction_id')
                ->constrained('receipt_transactions')
                ->cascadeOnDelete();

            $table->string('file_name');

            $table->string('file_path');

            $table->string('file_type')->nullable();

            $table->unsignedBigInteger('file_size')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receipt_transaction_documents');
    }
};