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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('menu_href')->default('javascript:void(0)');
            $table->boolean('enabled')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
