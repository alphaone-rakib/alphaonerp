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
        Schema::create('business_role_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_role_id');
            $table->unsignedBigInteger('menu_id');
            $table->timestamps();

            $table->foreign('business_role_id')->references('id')->on('business_roles')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_role_menu');
    }
};
