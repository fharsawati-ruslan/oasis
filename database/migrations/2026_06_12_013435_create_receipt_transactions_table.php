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
        Schema::create('receipt_transactions', function (Blueprint $table) {

            $table->id();

            // Relasi ke companies
            $table->foreignId('company_id')
                ->constrained('companies')
                ->cascadeOnDelete();

            // Relasi ke transaction_categories
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('transaction_categories')
                ->nullOnDelete();

            // Jenis dokumen
            $table->string('document_type');

            // Nomor invoice
            $table->string('invoice_number')
                ->nullable();

            // Nomor kwitansi (opsional)
            $table->string('receipt_number')
                ->nullable();

            // Vendor / Supplier
            $table->string('vendor')
                ->nullable();

            // Tanggal transaksi
            $table->date('transaction_date');

            // Nominal
            $table->decimal('amount', 18, 2);

            // Keterangan
            $table->text('description')
                ->nullable();

            // Status workflow
            $table->enum('status', [
                'draft',
                'submitted',
                'verified',
                'approved',
                'rejected'
            ])->default('draft');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_transactions');
    }
};