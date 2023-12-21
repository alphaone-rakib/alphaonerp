<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('warehouse.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Warehouse::latest();

        if ($request->warehouse_id)
            $query->where('warehouse_id', 'like', '%' . $request->warehouse_id . '%');

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countriesList = DB::table('countries')->pluck('name', 'id');
        return view('warehouse.create', compact('countriesList'));
    }

    public function getData(Request $request)
    {
        $json = new \stdClass();
        $id = request('id');
        if ($id) {
            $data = Warehouse::find($id);
            $revision['description'] = isset($data['description']) ? $data['description'] : null;
            $json = (object) $revision;
        }
        return response()->json($json);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'address_one' => ['required', 'string'],
            'address_two' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['required', 'string'],
            'manager_name' => ['required', 'string']
        ]);

        $data = $request->only(['warehouse_id', 'name', 'description', 'address_one', 'address_two', 'country', 'state', 'city', 'zip_code', 'manager_name']);
        $data['user_id'] = auth()->user()->id;
        Warehouse::create($data);
        return redirect()->route('warehouse.index')->with('success', trans('Warehouse Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        $countryName = DB::table('countries')->where('id', $warehouse->country)->first();
        $stateName = DB::table('states')->where('id', $warehouse->state)->first();
        $cityName = DB::table('cities')->where('id', $warehouse->city)->first();

        $country = isset($countryName->name) ? $countryName->name : "N/A";
        $state = isset($stateName->name) ? $stateName->name : "N/A";
        $city = isset($cityName->name) ? $cityName->name : "N/A";

        return view('warehouse.show', compact('country', 'state', 'city', 'warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        $countriesList = DB::table('countries')->pluck('name', 'id');
        return view('warehouse.edit', compact('countriesList', 'warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'warehouse_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'address_one' => ['required', 'string'],
            'address_two' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['required', 'string'],
            'manager_name' => ['required', 'string']
        ]);

        $data = $request->only(['warehouse_id', 'name', 'description', 'address_one', 'address_two', 'country', 'state', 'city', 'zip_code', 'manager_name']);
        $data['user_id'] = auth()->user()->id;
        $warehouse->update($data);
        return redirect()->route('warehouse.index')->with('success', trans('Warehouse Update Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        $partMasterCount = $warehouse->part_master()->count();
        if ($partMasterCount > 0) {
            return redirect()->route('warehouse.index')->with('error', trans('This Warehouse Have Part Master, First Delete the Part Master !'));
        }
        $warehouse->delete();
        return redirect()->route('warehouse.index')->with('success', trans('Warehouse Deleted Successfully'));
    }
}
