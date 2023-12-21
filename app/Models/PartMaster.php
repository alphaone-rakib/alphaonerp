<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'part_number',
        'description',
        'type',
        'group_id',
        'class_id',
        'costing_method',
        'buy_to_order',
        'non_stock_part',
        'quantity_bearing',
        'phantom_part',
        'inventory',
        'sales',
        'purchasing',
        'sales_unit_price',
        'internal_price',
        'track_lot',
        'track_serial_numbers',
        'active',
        'revision_id',
        'revision_name',
        'revision_description',
        'effective_date',
        'approved',
        'plant_id',
        'plant_type',
        'plant_warehouse',
        'plant_costing_method',
        'plant_inventort_min_on_hand',
        'plant_inventort_max_on_hand',
        'plant_inventort_safety_stock',
        'plant_purchase_buyer',
        'plant_purchase_supplier',
        'plant_purchase_min_order_qty',
        'plant_purchase_lead_time',
        'plant_manufacture_mrp',
        'plant_manufacture_generate_po_suggestion',
        'plant_manufacture_blackflush',
        'plant_manufacture_re_order_max',
        'warehouse_id',
        'warehouse_name',
        'warehouse_description',
        'warehouse_primary_bin',
        'warehouse_manual_abc_code',
        'warehouse_override_frequency',
        'warehouse_abc_code',
        'warehouse_count_frequency',
        'warehouse_min_abc',
        'warehouse_last_cycle_count_date',
        'warehouse_calculate_qty_adj',
        'warehouse_qty_adjustment_tolerance',
        'warehouse_calculate_percent',
        'warehouse_percentange_tolerance',
        'warehouse_calculate_quality',
        'warehouse_qty_tolerance',
        'warehouse_calculate_value',
        'warehouse_value_tolerance'
    ];

    public function partClass()
    {
        return $this->belongsTo(PartClass::class, 'class_id');
    }

    public function partGroup()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_name');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'plant_purchase_supplier');
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'plant_purchase_buyer');
    }
}
