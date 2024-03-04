<?php

namespace App\Http\Controllers;

use App\Models\Line;
use App\Models\PartMaster;
use App\Models\Customer;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::orderBy('name')->pluck('name', 'id');
        $partMasters = PartMaster::orderBy('part_number')->pluck('part_number', 'id');
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('line.index', compact('data', 'partMasters', 'customers'));
    }

    private function filter(Request $request)
    {
        $query = Line::latest();

        if ($request->part_id)
            $query->where('part_id', 'like', '%' . $request->part_id . '%');

        if ($request->customer_id)
            $query->where('customer_id', 'like', '%' . $request->customer_id . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::orderBy('name')->pluck('name', 'id');
        $pGroups = ProductGroup::orderBy('group_name')->pluck('group_name', 'id');
        $partMaster = PartMaster::orderBy('part_number')->get();
        return view('line.create', compact('partMaster', 'customers', 'pGroups'));
    }

    public function selectedPartMasterId(Request $request)
    {
        $tableId = $request->part_id;
        $selectedPartMaster = PartMaster::where('id', $tableId)->first();

        $response['selectedPartMaster'] = $selectedPartMaster;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'part_id' => ['required', 'string'],
            'description' => ['required', 'string'],
            'customer_id' => ['required', 'string'],
            'order_quantity' => ['nullable', 'string'],
            'order_quantity_type' => ['nullable', 'string'],
            'excepted_quantity' => ['required', 'string'],
            'excepted_quantity_type' => ['nullable', 'string'],
            'best_case_percentage' => ['nullable', 'string'],
            'worst_case_percentage' => ['nullable', 'string'],
            'confidence_percentage' => ['nullable', 'string'],
            'price_per' => ['nullable', 'string'],
            'unit_price' => ['required', 'string'],
            'discount_percentage' => ['nullable', 'string'],
            'discount_value' => ['nullable', 'string'],
            'price_group' => ['nullable', 'string'],
            'pricing_quantity' => ['nullable', 'string'],
            'pricing_quantity_type' => ['nullable', 'string'],
            'extended_price' => ['nullable', 'string'],
            'potential' => ['nullable', 'string'],
            'misc_charges' => ['nullable', 'string'],
            'tax' => ['nullable', 'string'],
            'total' => ['required', 'string'],
            'best_case_value' => ['nullable', 'string'],
            'worst_case_value' => ['nullable', 'string'],
            'excepted_value' => ['nullable', 'string'],
        ]);

        $data = $request->only(['part_id', 'description', 'customer_id', 'order_quantity', 'order_quantity_type', 'excepted_quantity', 'excepted_quantity_type', 'best_case_percentage', 'worst_case_percentage', 'confidence_percentage', 'price_per', 'unit_price', 'discount_percentage', 'discount_value', 'price_group', 'pricing_quantity', 'pricing_quantity_type', 'extended_price', 'potential', 'misc_charges', 'tax', 'total', 'best_case_value', 'worst_case_value', 'excepted_value']);
        $data['user_id'] = auth()->user()->id;

        DB::transaction(function () use ($data, $request) {
            Line::create($data);
        });
        return redirect()->route('line.index')->with('success', trans('Line Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Line $line)
    {
        return view('line.show', compact('line'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Line $line)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Line $line)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Line $line)
    {
        $line->delete();
        return redirect()->route('line.index')->with('success', trans('Line Deleted Successfully'));
    }
}
