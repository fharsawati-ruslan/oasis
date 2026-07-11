<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('investor_partners', function (Blueprint $table) {

            $table->string('phone')->nullable()->after('partner_name');

            $table->string('email')->nullable()->after('phone');

            $table->enum('status', [
                'Active',
                'Waiting',
                'Closed',
            ])->default('Active')->after('destination_account');

        });
    }

    public function down(): void
    {
        Schema::table('investor_partners', function (Blueprint $table) {

            $table->dropColumn([
                'phone',
                'email',
                'status',
            ]);

        });
    }
};