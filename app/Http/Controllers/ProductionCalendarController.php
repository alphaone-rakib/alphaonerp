<?php

namespace App\Http\Controllers;

use App\Models\ProductionCalendar;
use Illuminate\Http\Request;

class ProductionCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $months = $this->months();
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('production-calendar.index', compact('data', 'months'));
    }

    private function filter(Request $request)
    {
        $query = ProductionCalendar::latest();

        if ($request->production_calendar_id)
            $query->where('production_calendar_id', 'like', '%' . $request->production_calendar_id . '%');

        if ($request->production_calendar_name)
            $query->where('production_calendar_name', 'like', '%' . $request->production_calendar_name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $months = $this->months();
        return view('production-calendar.create', compact('months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'production_calendar_id' => ['required', 'string'],
            'production_calendar_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'production_calendar_start' => ['required', 'string'],
            'production_calendar_end' => ['required', 'string'],
            'work_per_week' => ['required', 'string'],
        ]);

        ProductionCalendar::create([
            'production_calendar_id' => $request->input('production_calendar_id'),
            'production_calendar_name' => $request->input('production_calendar_name'),
            'description' => $request->input('description'),
            'production_calendar_start' => $request->input('production_calendar_start'),
            'production_calendar_end' => $request->input('production_calendar_end'),
            'work_per_week' => $request->input('work_per_week'),
        ]);
        session()->flash('success', trans('Production Calendar Created Successfully'));
        return redirect()->route('production-calendar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductionCalendar $productionCalendar)
    {
        $months = $this->months();
        return view('production-calendar.show', compact('productionCalendar', 'months'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductionCalendar $productionCalendar)
    {
        $months = $this->months();
        return view('production-calendar.edit', compact('productionCalendar', 'months'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductionCalendar $productionCalendar)
    {
        $request->validate([
            'production_calendar_id' => ['required', 'string'],
            'production_calendar_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'production_calendar_start' => ['required', 'string'],
            'production_calendar_end' => ['required', 'string'],
            'work_per_week' => ['required', 'string'],
        ]);
        $data = $request->only(['production_calendar_id', 'production_calendar_name', 'description', 'production_calendar_start', 'production_calendar_end', 'work_per_week']);
        $productionCalendar->update($data);
        return redirect()->route('production-calendar.index')->with('success', trans('Production Calendar Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductionCalendar $productionCalendar)
    {
        $productionCalendar->delete();
        return redirect()->route('production-calendar.index')->with('success', trans('Production Calendar Deleted Successfully'));
    }
}
