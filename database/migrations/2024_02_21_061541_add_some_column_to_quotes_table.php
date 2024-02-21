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
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('ship_to_customer_id')->nullable();
            $table->string('one_time_ship_id')->nullable();
            $table->string('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('ship_to_customer_id')->nullable();
            $table->string('one_time_ship_id')->nullable();
            $table->string('rating')->nullable();
        });
    }
};
