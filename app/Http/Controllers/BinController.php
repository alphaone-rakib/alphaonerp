<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use Illuminate\Http\Request;

class BinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('bin.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Bin::latest();

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        if ($request->zone)
            $query->where('zone', 'like', '%' . $request->zone . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'inactive' => ['nullable', 'string'],
            'zone' => ['required', 'string'],
            'non_nettable' => ['nullable', 'string'],
            'squence' => ['required', 'string'],
            'portable' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        Bin::create([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'inactive' => $request->input('inactive'),
            'zone' => $request->input('zone'),
            'non_nettable' => $request->input('non_nettable'),
            'squence' => $request->input('squence'),
            'portable' => $request->input('portable'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('bin.index')->with('success', trans('Bin Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Bin $bin)
    {
        return view('bin.show', compact('bin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bin $bin)
    {
        return view('bin.edit', compact('bin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bin $bin)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'inactive' => ['nullable', 'string'],
            'zone' => ['required', 'string'],
            'non_nettable' => ['nullable', 'string'],
            'squence' => ['required', 'string'],
            'portable' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        $data = $request->only(['name', 'zone', 'squence', 'description']);
        if ($request->inactive) {
            $data['inactive'] = $request->inactive;
        } else {
            $data['inactive'] = '0';
        }

        if ($request->non_nettable) {
            $data['non_nettable'] = $request->non_nettable;
        } else {
            $data['non_nettable'] = '0';
        }

        if ($request->portable) {
            $data['portable'] = $request->portable;
        } else {
            $data['portable'] = '0';
        }

        $bin->update($data);
        return redirect()->route('bin.index')->with('success', trans('Bin Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bin $bin)
    {
        $bin->delete();
        return redirect()->route('bin.index')->with('success', trans('Group Deleted Successfully'));
    }
}
