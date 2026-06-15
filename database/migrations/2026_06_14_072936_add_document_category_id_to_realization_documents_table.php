<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('realization_documents', function (Blueprint $table) {

            $table->foreignId('document_category_id')
                ->nullable()
                ->after('company_id')
                ->constrained('document_categories')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('realization_documents', function (Blueprint $table) {

            $table->dropForeign(['document_category_id']);
            $table->dropColumn('document_category_id');

        });
    }
};