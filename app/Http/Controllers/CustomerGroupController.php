<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;

class CustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('customer-group.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = CustomerGroup::latest();

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
        return view('customer-group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $data = $request->only(['group_id', 'group_name', 'description', 'percentage_rate']);
        CustomerGroup::create($data);
        return redirect()->route('customer-group.index')->with('success', trans('Customer Group Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerGroup $customerGroup)
    {
        return view('customer-group.show', compact('customerGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerGroup $customerGroup)
    {
        return view('customer-group.edit', compact('customerGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerGroup $customerGroup)
    {
        $this->validation($request, $customerGroup->id);
        $data = $request->only(['group_id', 'group_name', 'description', 'percentage_rate']);
        $customerGroup->update($data);
        return redirect()->route('customer-group.index')->with('success', trans('Customer Group Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerGroup $customerGroup)
    {
        $customerCount = $customerGroup->customers()->count();
        if ($customerCount > 0) {
            return redirect()->route('customer-group.index')->with('error', trans('This Group Have Customer, First Delete the Customer !'));
        }

        $customerGroup->delete();
        return redirect()->route('customer-group.index')->with('success', trans('Customer Group Deleted Successfully'));
    }

    /**
     * Validation function
     *
     * @param Request $request
     * @return void
     */
    private function validation(Request $request, $id = 0)
    {
        $request->validate([
            'group_id' => ['required', 'string'],
            'group_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'percentage_rate' => ['nullable', 'string'],
        ]);
    }
}
