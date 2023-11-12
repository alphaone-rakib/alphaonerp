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
        Schema::create('fiscal_calendars', function (Blueprint $table) {
            $table->id();
            $table->string('fiscal_calendar_id')->nullable();
            $table->string('fiscal_calendar_name')->nullable();
            $table->text('description')->nullable();
            $table->string('fiscal_calendar_start')->nullable();
            $table->string('fiscal_calendar_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiscal_calendars');
    }
};
