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
        Schema::create('fiscal_years', function (Blueprint $table) {
            $table->id();
            $table->string('fiscal_year_id')->nullable();
            $table->string('fiscal_year_name')->nullable();
            $table->text('description')->nullable();
            $table->string('fiscal_year_start')->nullable();
            $table->string('fiscal_year_end')->nullable();
            $table->string('number_periods')->nullable();
            $table->string('number_closing_periods')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiscal_years');
    }
};
