<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investor_partners', function (Blueprint $table) {
            $table->id();

            $table->string('investor_name')->nullable();
            $table->date('entry_date')->nullable();
            $table->decimal('investment_amount', 18, 2)->nullable();

            $table->string('partner_name')->nullable();
            $table->string('land_area')->nullable();
            $table->text('address')->nullable();

            $table->date('planting_date')->nullable();
            $table->date('harvest_date')->nullable();

            $table->date('factory_payment_date')->nullable();

            $table->decimal('profit_sharing', 18, 2)->nullable();

            $table->string('destination_account')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investor_partners');
    }
};