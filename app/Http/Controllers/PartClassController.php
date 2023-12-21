<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\PartClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('part-class.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = PartClass::latest();

        if ($request->class_name)
            $query->where('class_name', 'like', '%' . $request->class_name . '%');

        if ($request->class_description)
            $query->where('class_description', 'like', '%' . $request->class_description . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buyers = Buyer::orderBy('id')->get();
        return view('part-class.create', compact('buyers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $data = $request->only(['class_name', 'class_description', 'class_buyer']);
        $data['user_id'] = auth()->user()->id;
        DB::transaction(function () use ($data, $request) {
            PartClass::create($data);
        });
        return redirect()->route('part-class.index')->with('success', trans('Part Class Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PartClass $partClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartClass $partClass)
    {
        $buyers = Buyer::orderBy('id')->get();
        return view('part-class.edit', compact('buyers', 'partClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartClass $partClass)
    {
        $this->validation($request);
        $data = $request->only(['class_name', 'class_description', 'class_buyer']);
        $data['user_id'] = auth()->user()->id;
        $partClass->update($data);
        return redirect()->route('part-class.index')->with('success', trans('Part Class Edit Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartClass $partClass)
    {
        $partMasterCount = $partClass->part_master()->count();
        if ($partMasterCount > 0) {
            return redirect()->route('part-class.index')->with('error', trans('This Part Class Have Part Master, First Delete the Part Master !'));
        }
        $partClass->delete();
        return redirect()->route('part-class.index')->with('success', trans('Part Class Deleted Successfully'));
    }

    private function validation(Request $request)
    {
        $request->validate([
            'class_name' => ['required', 'string', 'max:255'],
            'class_description' => ['nullable', 'string', 'max:255'],
            'class_buyer' => ['required', 'string', 'max:255']
        ]);
    }
}
