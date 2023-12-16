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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('currency_id')->nullable();
            $table->string('language_id')->nullable();
            $table->string('tax_region')->nullable();
            $table->string('tax_description')->nullable();
            $table->string('group')->nullable();
            $table->string('terms')->nullable();
            $table->string('ship_via')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('fob')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
