<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Plant;
use App\Models\Buyer;
use App\Models\PartClass;
use App\Models\PartMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('part-master.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = PartMaster::latest();

        if ($request->part_number)
            $query->where('part_number', 'like', '%' . $request->part_number . '%');

        if ($request->description)
            $query->where('description', 'like', '%' . $request->description . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::orderBy('group_name')->pluck('group_name', 'id');
        $partClass = PartClass::orderBy('class_name')->pluck('class_name', 'id');
        return view('part-master.create', compact('groups', 'partClass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'part_number' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'group_id' => ['required', 'string'],
            'class_id' => ['required', 'string'],
            'costing_method' => ['required', 'string'],
            'active' => ['nullable', 'string'],
            'buy_to_order' => ['nullable', 'string'],
            'non_stock_part' => ['nullable', 'string'],
            'quantity_bearing' => ['nullable', 'string'],
            'phantom_part' => ['nullable', 'string'],
            'inventory' => ['required', 'string'],
            'sales' => ['required', 'string'],
            'purchasing' => ['required', 'string'],
            'sales_unit_price' => ['required', 'string'],
            'internal_price' => ['required', 'string'],
            'track_lot' => ['nullable', 'string'],
            'track_serial_numbers' => ['nullable', 'string']
        ]);

        $data = $request->only(['part_number', 'description', 'type', 'group_id', 'class_id', 'costing_method', 'inventory', 'sales', 'purchasing', 'sales_unit_price', 'internal_price']);
        $data['user_id'] = auth()->user()->id;
        if ($request->active) {
            $data['active'] = $request->active;
        }

        if ($request->buy_to_order) {
            $data['buy_to_order'] = $request->buy_to_order;
        }

        if ($request->non_stock_part) {
            $data['non_stock_part'] = $request->non_stock_part;
        }

        if ($request->quantity_bearing) {
            $data['quantity_bearing'] = $request->quantity_bearing;
        }

        if ($request->phantom_part) {
            $data['phantom_part'] = $request->phantom_part;
        }

        if ($request->track_lot) {
            $data['track_lot'] = $request->track_lot;
        }

        if ($request->track_serial_numbers) {
            $data['track_serial_numbers'] = $request->track_serial_numbers;
        }
        DB::transaction(function () use ($data, $request) {
            PartMaster::create($data);
        });
        return redirect()->route('part-master.index')->with('success', trans('Part Master Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PartMaster $partMaster)
    {
        $groups = Group::orderBy('group_name')->pluck('group_name', 'id');
        $partClass = PartClass::orderBy('class_name')->pluck('class_name', 'id');
        $plants = Plant::where('enabled', 1)->pluck('name', 'id');
        $buyers = Buyer::orderBy('id')->get();
        return view('part-master.show', compact('groups', 'partClass', 'plants', 'buyers', 'partMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartMaster $partMaster)
    {
        $groups = Group::orderBy('group_name')->pluck('group_name', 'id');
        $partClass = PartClass::orderBy('class_name')->pluck('class_name', 'id');
        $plants = Plant::where('enabled', 1)->pluck('name', 'id');
        $buyers = Buyer::orderBy('id')->get();
        return view('part-master.edit', compact('groups', 'partClass', 'plants', 'buyers', 'partMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartMaster $partMaster)
    {
        $request->validate([
            'part_number' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'string'],
            'group_id' => ['required', 'string'],
            'class_id' => ['required', 'string'],
            'costing_method' => ['required', 'string'],
            'active' => ['nullable', 'string'],
            'buy_to_order' => ['nullable', 'string'],
            'non_stock_part' => ['nullable', 'string'],
            'quantity_bearing' => ['nullable', 'string'],
            'phantom_part' => ['nullable', 'string'],
            'inventory' => ['required', 'string'],
            'sales' => ['required', 'string'],
            'purchasing' => ['required', 'string'],
            'sales_unit_price' => ['required', 'string'],
            'internal_price' => ['required', 'string'],
            'track_lot' => ['nullable', 'string'],
            'track_serial_numbers' => ['nullable', 'string']
        ]);

        $data = $request->only(['part_number', 'description', 'type', 'group_id', 'class_id', 'costing_method', 'inventory', 'sales', 'purchasing', 'sales_unit_price', 'internal_price']);
        $data['user_id'] = auth()->user()->id;
        if ($request->active) {
            $data['active'] = $request->active;
        } else {
            $data['active'] = '0';
        }

        if ($request->buy_to_order) {
            $data['buy_to_order'] = $request->buy_to_order;
        } else {
            $data['buy_to_order'] = '0';
        }

        if ($request->non_stock_part) {
            $data['non_stock_part'] = $request->non_stock_part;
        } else {
            $data['non_stock_part'] = '0';
        }

        if ($request->quantity_bearing) {
            $data['quantity_bearing'] = $request->quantity_bearing;
        } else {
            $data['quantity_bearing'] = '0';
        }

        if ($request->phantom_part) {
            $data['phantom_part'] = $request->phantom_part;
        } else {
            $data['phantom_part'] = '0';
        }

        if ($request->track_lot) {
            $data['track_lot'] = $request->track_lot;
        } else {
            $data['track_lot'] = '0';
        }

        if ($request->track_serial_numbers) {
            $data['track_serial_numbers'] = $request->track_serial_numbers;
        } else {
            $data['track_serial_numbers'] = '0';
        }

        DB::transaction(function () use ($data, $partMaster) {
            $partMaster->update($data);
        });

        return redirect()->route('part-master.index')->with('success', trans('Part Master Updated Successfully'));
    }

    public function revisionTabUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'revision_name' => ['required', 'string'],
            'revision_description' => ['nullable', 'string'],
            'effective_date' => ['nullable', 'string'],
            'approved' => ['nullable', 'string']
        ]);

        $data = $request->only(['revision_name', 'revision_description', 'effective_date']);
        $data['user_id'] = auth()->user()->id;
        if ($request->approved) {
            $data['approved'] = $request->approved;
        } else {
            $data['approved'] = '0';
        }

        $partMaster = PartMaster::find($id);

        DB::transaction(function () use ($data, $partMaster) {
            $partMaster->update($data);
        });

        return redirect()->route('part-master.index')->with('success', trans('Part Master Revision Updated Successfully'));
    }

    public function plantTabUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'plant_id' => ['required', 'string'],
            'plant_type' => ['required', 'string'],
            'plant_warehouse' => ['required', 'string'],
            'plant_costing_method' => ['nullable', 'string'],
            'plant_inventort_min_on_hand' => ['required', 'string'],
            'plant_inventort_max_on_hand' => ['required', 'string'],
            'plant_inventort_safety_stock' => ['required', 'string'],
            'plant_purchase_buyer' => ['required', 'string'],
            'plant_purchase_supplier' => ['required', 'string'],
            'plant_purchase_min_order_qty' => ['required', 'string'],
            'plant_purchase_lead_time' => ['required', 'string'],
            'plant_manufacture_mrp' => ['required', 'string'],
            'plant_manufacture_generate_po_suggestion' => ['nullable', 'string'],
            'plant_manufacture_blackflush' => ['nullable', 'string'],
            'plant_manufacture_re_order_max' => ['nullable', 'string']
        ]);

        $data = $request->only(['plant_id', 'plant_type', 'plant_warehouse', 'plant_costing_method', 'plant_inventort_min_on_hand', 'plant_inventort_max_on_hand', 'plant_inventort_safety_stock', 'plant_purchase_buyer', 'plant_purchase_supplier', 'plant_purchase_min_order_qty', 'plant_purchase_lead_time', 'plant_manufacture_mrp', 'plant_manufacture_blackflush', 'plant_manufacture_re_order_max']);
        $data['user_id'] = auth()->user()->id;
        if ($request->plant_manufacture_generate_po_suggestion) {
            $data['plant_manufacture_generate_po_suggestion'] = $request->plant_manufacture_generate_po_suggestion;
        } else {
            $data['plant_manufacture_generate_po_suggestion'] = '0';
        }

        $partMaster = PartMaster::find($id);

        DB::transaction(function () use ($data, $partMaster) {
            $partMaster->update($data);
        });

        return redirect()->route('part-master.index')->with('success', trans('Part Master Plant Updated Successfully'));
    }

    public function warehouseTabUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'warehouse_name' => ['required', 'string'],
            'warehouse_primary_bin' => ['nullable', 'string'],
            'warehouse_description' => ['nullable', 'string'],
            'warehouse_manual_abc_code' => ['required', 'string'],
            'warehouse_override_frequency' => ['nullable', 'string'],
            'warehouse_abc_code' => ['nullable', 'string'],
            'warehouse_count_frequency' => ['nullable', 'string'],
            'warehouse_min_abc' => ['nullable', 'string'],
            'warehouse_last_cycle_count_date' => ['nullable', 'string'],
            'warehouse_calculate_qty_adj' => ['nullable', 'string'],
            'warehouse_qty_adjustment_tolerance' => ['nullable', 'string'],
            'warehouse_calculate_percent' => ['nullable', 'string'],
            'warehouse_percentange_tolerance' => ['nullable', 'string'],
            'warehouse_calculate_quality' => ['nullable', 'string'],
            'warehouse_qty_tolerance' => ['nullable', 'string'],
            'warehouse_calculate_value' => ['nullable', 'string'],
            'warehouse_value_tolerance' => ['nullable', 'string']
        ]);

        $data = $request->only(['warehouse_name', 'warehouse_primary_bin', 'warehouse_description', 'warehouse_manual_abc_code', 'warehouse_abc_code', 'warehouse_min_abc', 'warehouse_last_cycle_count_date', 'warehouse_qty_adjustment_tolerance', 'warehouse_percentange_tolerance', 'warehouse_qty_tolerance', 'warehouse_value_tolerance']);
        $data['user_id'] = auth()->user()->id;
        if ($request->warehouse_override_frequency) {
            $data['warehouse_override_frequency'] = $request->warehouse_override_frequency;
        } else {
            $data['warehouse_override_frequency'] = '0';
        }

        if ($request->warehouse_count_frequency) {
            $data['warehouse_count_frequency'] = $request->warehouse_count_frequency;
        } else {
            $data['warehouse_count_frequency'] = '0';
        }

        if ($request->warehouse_calculate_qty_adj) {
            $data['warehouse_calculate_qty_adj'] = $request->warehouse_calculate_qty_adj;
        } else {
            $data['warehouse_calculate_qty_adj'] = '0';
        }

        if ($request->warehouse_calculate_percent) {
            $data['warehouse_calculate_percent'] = $request->warehouse_calculate_percent;
        } else {
            $data['warehouse_calculate_percent'] = '0';
        }

        if ($request->warehouse_calculate_quality) {
            $data['warehouse_calculate_quality'] = $request->warehouse_calculate_quality;
        } else {
            $data['warehouse_calculate_quality'] = '0';
        }

        if ($request->warehouse_calculate_value) {
            $data['warehouse_calculate_value'] = $request->warehouse_calculate_value;
        } else {
            $data['warehouse_calculate_value'] = '0';
        }

        $partMaster = PartMaster::find($id);

        DB::transaction(function () use ($data, $partMaster) {
            $partMaster->update($data);
        });

        return redirect()->route('part-master.index')->with('success', trans('Part Master Warehouse Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartMaster $partMaster)
    {
        //
    }
}
