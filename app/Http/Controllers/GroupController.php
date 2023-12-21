<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('groups.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Group::latest();

        if ($request->group_id)
            $query->where('group_id', 'like', '%' . $request->group_id . '%');

        if ($request->group_name)
            $query->where('group_name', 'like', '%' . $request->group_name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id' => ['required', 'string'],
            'group_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'sales_site' => ['required', 'string'],
            'warranty' => ['required', 'string'],
            'planner' => ['required', 'string'],
            'tax_category' => ['required', 'string'],
        ]);

        Group::create([
            'user_id' => auth()->user()->id,
            'group_id' => $request->input('group_id'),
            'group_name' => $request->input('group_name'),
            'description' => $request->input('description'),
            'sales_site' => $request->input('sales_site'),
            'warranty' => $request->input('warranty'),
            'planner' => $request->input('planner'),
            'tax_category' => $request->input('tax_category')
        ]);

        return redirect()->route('group.index')->with('success', trans('Group Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'group_id' => ['required', 'string'],
            'group_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'sales_site' => ['required', 'string'],
            'warranty' => ['required', 'string'],
            'planner' => ['required', 'string'],
            'tax_category' => ['required', 'string'],
        ]);

        $data = $request->only(['group_id', 'group_name', 'description', 'sales_site', 'warranty', 'planner', 'tax_category']);
        $group->update($data);
        return redirect()->route('group.index')->with('success', trans('Group Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $partMasterCount = $group->part_master()->count();
        if ($partMasterCount > 0) {
            return redirect()->route('group.index')->with('error', trans('This Part Group Have Part Master, First Delete the Part Master !'));
        }
        $group->delete();
        return redirect()->route('group.index')->with('success', trans('Group Deleted Successfully'));
    }
}
