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
        Schema::create('part_masters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('part_number')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('group_id')->nullable();
            $table->string('class_id')->nullable();
            $table->string('costing_method')->nullable();
            $table->string('buy_to_order')->nullable();
            $table->string('non_stock_part')->nullable();
            $table->string('quantity_bearing')->nullable();
            $table->string('phantom_part')->nullable();
            $table->string('inventory')->nullable();
            $table->string('sales')->nullable();
            $table->string('purchasing')->nullable();
            $table->string('sales_unit_price')->nullable();
            $table->string('internal_price')->nullable();
            $table->string('track_lot')->nullable();
            $table->string('track_serial_numbers')->nullable();
            $table->boolean('active')->default(1);
            $table->string('revision_id')->nullable();
            $table->string('revision_name')->nullable();
            $table->string('revision_description')->nullable();
            $table->string('effective_date')->nullable();
            $table->boolean('approved')->nullable();
            $table->string('plant_id')->nullable();
            $table->string('plant_type')->nullable();
            $table->string('plant_warehouse')->nullable();
            $table->string('plant_costing_method')->nullable();
            $table->string('plant_inventort_min_on_hand')->nullable();
            $table->string('plant_inventort_max_on_hand')->nullable();
            $table->string('plant_inventort_safety_stock')->nullable();
            $table->string('plant_purchase_buyer')->nullable();
            $table->string('plant_purchase_supplier')->nullable();
            $table->string('plant_purchase_min_order_qty')->nullable();
            $table->string('plant_purchase_lead_time')->nullable();
            $table->string('plant_manufacture_mrp')->nullable();
            $table->boolean('plant_manufacture_generate_po_suggestion')->nullable();
            $table->string('plant_manufacture_blackflush')->nullable();
            $table->string('plant_manufacture_re_order_max')->nullable();
            $table->string('warehouse_id')->nullable();
            $table->string('warehouse_name')->nullable();
            $table->text('warehouse_description')->nullable();
            $table->string('warehouse_primary_bin')->nullable();
            $table->string('warehouse_manual_abc_code')->nullable();
            $table->string('warehouse_override_frequency')->nullable();
            $table->string('warehouse_abc_code')->nullable();
            $table->string('warehouse_count_frequency')->nullable();
            $table->string('warehouse_min_abc')->nullable();
            $table->string('warehouse_last_cycle_count_date')->nullable();
            $table->string('warehouse_calculate_qty_adj')->nullable();
            $table->string('warehouse_qty_adjustment_tolerance')->nullable();
            $table->string('warehouse_calculate_percent')->nullable();
            $table->string('warehouse_percentange_tolerance')->nullable();
            $table->string('warehouse_calculate_quality')->nullable();
            $table->string('warehouse_qty_tolerance')->nullable();
            $table->string('warehouse_calculate_value')->nullable();
            $table->string('warehouse_value_tolerance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_masters');
    }
};
