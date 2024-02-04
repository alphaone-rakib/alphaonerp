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
        Schema::create('one_time_ship_tos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('contact')->nullable();
            $table->string('name')->nullable();
            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->string('save_as')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('ship_to')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('tax_liability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('one_time_ship_tos');
    }
};
