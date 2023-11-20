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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('name')->nullable();
            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('logo')->nullable();
            $table->text('ship_address_one')->nullable();
            $table->text('ship_address_two')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_state')->nullable();
            $table->string('ship_zip_code')->nullable();
            $table->string('ship_country')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('ship_fax')->nullable();
            $table->string('bill_currency_id')->nullable();
            $table->string('bill_customer_group_id')->nullable();
            $table->string('bill_payment_method_id')->nullable();
            $table->string('bill_federal_id')->nullable();
            $table->string('bill_terms_id')->nullable();
            $table->string('bill_terms_type')->nullable();
            $table->string('bill_ship_via')->nullable();
            $table->string('bill_fob')->nullable();
            $table->string('bill_tax_id')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_cell_phone')->nullable();
            $table->boolean('billing')->default(0);
            $table->boolean('purchasing')->default(0);
            $table->boolean('shipping')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
