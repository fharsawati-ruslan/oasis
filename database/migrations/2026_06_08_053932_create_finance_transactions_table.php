<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finance_transactions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('company_id')
                ->constrained('companies')
                ->cascadeOnDelete();

            $table->foreignId('transaction_category_id')
                ->constrained('transaction_categories')
                ->cascadeOnDelete();

            $table->date('transaction_date');

            $table->enum('type', [
                'income',
                'expense',
            ]);

            $table->decimal('amount', 18, 2);

            $table->text('description')
                ->nullable();

            $table->string('invoice_file')
                ->nullable();

            $table->enum('status', [
                'draft',
                'submitted',
                'approved',
                'rejected',
            ])->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finance_transactions');
    }
};