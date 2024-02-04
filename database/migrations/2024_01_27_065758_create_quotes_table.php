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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('quote_entry')->nullable();
            $table->string('sold_to_customer_name_address')->nullable();
            $table->boolean('one_time_ship_address')->default(0);
            $table->string('ship_to_customer_name_address')->nullable();
            $table->string('bill_to_customer')->nullable();
            $table->string('bill_to_po')->nullable();
            $table->string('bill_to_open')->nullable();
            $table->string('bill_to_due')->nullable();
            $table->string('bill_to_days_open')->nullable();
            $table->string('ship_via')->nullable();
            $table->string('terms')->nullable();
            $table->string('disc')->nullable();
            $table->string('territory')->nullable();
            $table->string('primary_sales')->nullable();
            $table->string('best_case')->nullable();
            $table->string('worst_case')->nullable();
            $table->string('confidence')->nullable();
            $table->double('gross_value', 15, 2)->nullable();
            $table->string('discount_percentage')->nullable();
            $table->double('discount_value', 15, 2)->nullable();
            $table->double('rounding', 15, 2)->nullable();
            $table->double('potential', 15, 2)->nullable();
            $table->double('misc_charges', 15, 2)->nullable();
            $table->double('tax', 15, 2)->nullable();
            $table->double('total', 15, 2)->nullable();
            $table->string('summary_best_case_percentage')->nullable();
            $table->double('summary_best_case_value', 15, 2)->nullable();
            $table->string('summary_worst_case_percentage')->nullable();
            $table->double('summary_worst_case_value', 15, 2)->nullable();
            $table->string('summary_exptected_percentage')->nullable();
            $table->double('summary_exptected_value', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
