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
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->bigInteger('part_id')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->double('order_quantity', 15, 2)->nullable();
            $table->string('order_quantity_type')->nullable();
            $table->double('excepted_quantity', 15, 2)->nullable();
            $table->string('excepted_quantity_type')->nullable();
            $table->string('best_case_percentage')->nullable();
            $table->string('worst_case_percentage')->nullable();
            $table->string('confidence_percentage')->nullable();
            $table->string('price_per')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('override_price_list')->nullable();
            $table->string('price_list')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->double('discount_value', 15, 2)->nullable();
            $table->string('override_discount_price_list')->nullable();
            $table->string('discount_price_list')->nullable();
            $table->string('price_group')->nullable();
            $table->string('pricing_quantity')->nullable();
            $table->string('pricing_quantity_type')->nullable();
            $table->double('extended_price', 15, 2)->nullable();
            $table->double('potential', 15, 2)->nullable();
            $table->double('misc_charges', 15, 2)->nullable();
            $table->double('tax', 15, 2)->nullable();
            $table->double('total', 15, 2)->nullable();
            $table->double('best_case_value', 15, 2)->nullable();
            $table->double('worst_case_value', 15, 2)->nullable();
            $table->double('excepted_value', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lines');
    }
};
