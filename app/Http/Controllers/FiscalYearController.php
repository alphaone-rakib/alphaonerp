<?php

namespace App\Http\Controllers;

use App\Models\FiscalYear;
use Illuminate\Http\Request;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $months = $this->months();
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('fiscal-year.index', compact('data', 'months'));
    }

    private function filter(Request $request)
    {
        $query = FiscalYear::latest();

        if ($request->fiscal_year_id)
            $query->where('fiscal_year_id', 'like', '%' . $request->fiscal_year_id . '%');

        if ($request->fiscal_year_name)
            $query->where('fiscal_year_name', 'like', '%' . $request->fiscal_year_name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $months = $this->months();
        return view('fiscal-year.create', compact('months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fiscal_year_id' => ['required', 'string'],
            'fiscal_year_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'fiscal_year_start' => ['required', 'string'],
            'fiscal_year_end' => ['required', 'string'],
            'number_periods' => ['required', 'string'],
            'number_closing_periods' => ['required', 'string'],
        ]);

        $data = $request->only(['fiscal_year_id', 'fiscal_year_name', 'description', 'fiscal_year_start', 'fiscal_year_end', 'number_periods', 'number_closing_periods']);
        FiscalYear::create($data);
        session()->flash('success', trans('Fiscal Year Created Successfully'));
        return redirect()->route('fiscal-year.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FiscalYear $fiscalYear)
    {
        $months = $this->months();
        return view('fiscal-year.show', compact('months', 'fiscalYear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FiscalYear $fiscalYear)
    {
        $months = $this->months();
        return view('fiscal-year.edit', compact('fiscalYear', 'months'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FiscalYear $fiscalYear)
    {
        $request->validate([
            'fiscal_year_id' => ['required', 'string'],
            'fiscal_year_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'fiscal_year_start' => ['required', 'string'],
            'fiscal_year_end' => ['required', 'string'],
            'number_periods' => ['required', 'string'],
            'number_closing_periods' => ['required', 'string'],
        ]);
        $data = $request->only(['fiscal_year_id', 'fiscal_year_name', 'description', 'fiscal_year_start', 'fiscal_year_end', 'number_periods', 'number_closing_periods']);
        $fiscalYear->update($data);
        return redirect()->route('fiscal-year.index')->with('success', trans('Fiscal Year Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FiscalYear $fiscalYear)
    {
        $fiscalYear->delete();
        return redirect()->route('fiscal-year.index')->with('success', trans('Fiscal Year Deleted Successfully'));
    }
}
