<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('supplier.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Supplier::latest();

        if ($request->supplier_id)
            $query->where('supplier_id', 'like', '%' . $request->supplier_id . '%');

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = config('money');
        $currencies = $currencies['currencies'];
        $getLang = $this->getLang();
        return view('supplier.create', compact('currencies', 'getLang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'currency_id' => ['required', 'string'],
            'language_id' => ['required', 'string'],
            'tax_region' => ['nullable', 'string'],
            'tax_description' => ['nullable', 'string'],
            'group' => ['required', 'string'],
            'terms' => ['required', 'string'],
            'ship_via' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
            'fob' => ['required', 'string'],
        ]);
        $data = $request->only(['supplier_id', 'name', 'currency_id', 'language_id', 'tax_region', 'tax_description', 'group', 'terms', 'ship_via', 'payment_method', 'fob']);
        $data['user_id'] = auth()->user()->id;
        Supplier::create($data);
        return redirect()->route('supplier.index')->with('success', trans('Supplier Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $currencies = config('money');
        $currencies = $currencies['currencies'];
        $getLang = $this->getLang();
        return view('supplier.show', compact('supplier', 'currencies', 'getLang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $currencies = config('money');
        $currencies = $currencies['currencies'];
        $getLang = $this->getLang();
        return view('supplier.edit', compact('supplier', 'currencies', 'getLang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'supplier_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'currency_id' => ['required', 'string'],
            'language_id' => ['required', 'string'],
            'tax_region' => ['nullable', 'string'],
            'tax_description' => ['nullable', 'string'],
            'group' => ['required', 'string'],
            'terms' => ['required', 'string'],
            'ship_via' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
            'fob' => ['required', 'string'],
        ]);
        $data = $request->only(['supplier_id', 'name', 'currency_id', 'language_id', 'tax_region', 'tax_description', 'group', 'terms', 'ship_via', 'payment_method', 'fob']);
        $data['user_id'] = auth()->user()->id;
        $supplier->update($data);
        return redirect()->route('supplier.index')->with('success', trans('Supplier Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $partMasterCount = $supplier->part_master()->count();
        if ($partMasterCount > 0) {
            return redirect()->route('supplier.index')->with('error', trans('This Supplier Have Part Master Entry, First Delete the Part Master !'));
        }
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', trans('Supplier Deleted Successfully'));
    }
}
