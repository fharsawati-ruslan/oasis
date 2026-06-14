<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('realization_documents', function (Blueprint $table) {

            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->cascadeOnDelete();

            $table->string('document_number')->nullable();

            $table->string('title');

            $table->date('document_date')->nullable();

            $table->string('file_path')->nullable();

            $table->text('description')->nullable();

            $table->enum('status', [
                'draft',
                'review',
                'approved',
                'archived'
            ])->default('draft');

        });
    }

    public function down(): void
    {
        Schema::table('realization_documents', function (Blueprint $table) {

            $table->dropForeign(['company_id']);

            $table->dropColumn([
                'company_id',
                'document_number',
                'title',
                'document_date',
                'file_path',
                'description',
                'status',
            ]);
        });
    }
};