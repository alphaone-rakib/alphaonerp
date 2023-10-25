<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        $companies = Company::where('enabled', '1')->pluck('name', 'id');
        return view('plants.index', compact('data', 'companies'));
    }

    private function filter(Request $request)
    {
        $query = Plant::latest();
        if ($request->company_id)
            $query->where('company_id', 'like', '%' . $request->company_id . '%');

        if ($request->plant_id)
            $query->where('plant_id', 'like', '%' . $request->plant_id . '%');

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');


        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('enabled', '1')->pluck('name', 'id');
        return view('plants.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => ['required', 'string'],
            'plant_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string']
        ]);

        $company = Plant::create([
            'user_id' => auth()->user()->id,
            'company_id' => $request->input('company_id'),
            'plant_id' => $request->input('plant_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'enabled' => 1
        ]);

        session()->flash('success', trans('Plant Created Successfully'));
        return redirect()->route('plant.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        $companies = Company::where('enabled', '1')->pluck('name', 'id');
        return view('plants.show', compact('plant', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        $companies = Company::where('enabled', '1')->pluck('name', 'id');
        return view('plants.edit', compact('plant', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $data = $request->only(['company_id', 'plant_id', 'name', 'description']);
        $plant->update($data);
        return redirect()->route('plant.index')->with('success', trans('Plant Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();
        return redirect()->route('plant.index')->with('success', trans('Plant Deleted Successfully'));
    }
}
