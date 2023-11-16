<?php

namespace App\Http\Controllers;

use App\Models\FiscalCalendar;
use Illuminate\Http\Request;

class FiscalCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $months = $this->months();
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('fiscal-calendar.index', compact('data', 'months'));
    }

    private function filter(Request $request)
    {
        $query = FiscalCalendar::latest();

        if ($request->fiscal_calendar_id)
            $query->where('fiscal_calendar_id', 'like', '%' . $request->fiscal_calendar_id . '%');

        if ($request->fiscal_calendar_name)
            $query->where('fiscal_calendar_name', 'like', '%' . $request->fiscal_calendar_name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $months = $this->months();
        return view('fiscal-calendar.create', compact('months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fiscal_calendar_id' => ['required', 'string'],
            'fiscal_calendar_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'fiscal_calendar_start' => ['required', 'string'],
            'fiscal_calendar_end' => ['required', 'string'],
        ]);
        FiscalCalendar::create([
            'fiscal_calendar_id' => $request->input('fiscal_calendar_id'),
            'fiscal_calendar_name' => $request->input('fiscal_calendar_name'),
            'description' => $request->input('description'),
            'fiscal_calendar_start' => $request->input('fiscal_calendar_start'),
            'fiscal_calendar_end' => $request->input('fiscal_calendar_end'),
        ]);
        session()->flash('success', trans('Fiscal Calendar Created Successfully'));
        return redirect()->route('fiscal-calendar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FiscalCalendar $fiscalCalendar)
    {
        $months = $this->months();
        return view('fiscal-calendar.show', compact('fiscalCalendar', 'months'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FiscalCalendar $fiscalCalendar)
    {
        $months = $this->months();
        return view('fiscal-calendar.edit', compact('fiscalCalendar', 'months'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FiscalCalendar $fiscalCalendar)
    {
        $request->validate([
            'fiscal_calendar_id' => ['required', 'string'],
            'fiscal_calendar_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'fiscal_calendar_start' => ['required', 'string'],
            'fiscal_calendar_end' => ['required', 'string'],
        ]);
        $data = $request->only(['fiscal_calendar_id', 'fiscal_calendar_name', 'description', 'fiscal_calendar_start', 'fiscal_calendar_end']);
        $fiscalCalendar->update($data);
        return redirect()->route('fiscal-calendar.index')->with('success', trans('Fiscal Calendar Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FiscalCalendar $fiscalCalendar)
    {
        $fiscalCalendar->delete();
        return redirect()->route('fiscal-calendar.index')->with('success', trans('Fiscal Calendar Deleted Successfully'));
    }
}
