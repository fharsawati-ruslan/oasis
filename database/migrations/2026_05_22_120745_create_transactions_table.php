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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date');

    $table->string('supplier');
    $table->string('supplier_reference');

    $table->string('car_plate');

    $table->string('address');

    $table->decimal('dry_matter', 5, 2)->nullable();

    $table->integer('qty_inbound')->default(0);

    $table->integer('qty_outbound')->default(0);

    $table->integer('total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
