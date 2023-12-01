<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('product-group.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = ProductGroup::latest();

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
        return view('product-group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $data = $request->only(['group_id', 'group_name', 'description']);
        ProductGroup::create($data);
        return redirect()->route('product-group.index')->with('success', trans('Product Group Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductGroup $productGroup)
    {
        return view('product-group.show', compact('productGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductGroup $productGroup)
    {
        return view('product-group.edit', compact('productGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductGroup $productGroup)
    {
        $this->validation($request, $productGroup->id);
        $data = $request->only(['group_id', 'group_name', 'description']);
        $productGroup->update($data);
        return redirect()->route('product-group.index')->with('success', trans('Product Group Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGroup $productGroup)
    {
        $productGroup->delete();
        return redirect()->route('product-group.index')->with('success', trans('Product Group Deleted Successfully'));
    }

    private function validation(Request $request, $id = 0)
    {
        $request->validate([
            'group_id' => ['required', 'string'],
            'group_name' => ['required', 'string'],
            'description' => ['nullable', 'string']
        ]);
    }
}
