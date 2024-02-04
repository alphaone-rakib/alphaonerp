<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\OneTimeShipTo;
use Illuminate\Support\Facades\DB;

class OneTimeShipToController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('one_time_ship.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = OneTimeShipTo::latest();

        if ($request->contact)
            $query->where('contact', 'like', '%' . $request->contact . '%');

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::orderBy('name')->pluck('name', 'id');
        $countriesList = DB::table('countries')->pluck('name', 'id');
        return view('one_time_ship.create', compact('customers', 'countriesList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);

        OneTimeShipTo::create([
            'user_id' => auth()->user()->id,
            'contact' => $request->input('contact'),
            'name' => $request->input('name'),
            'save_as' => $request->input('save_as'),
            'address_one' => $request->input('address_one'),
            'address_two' => $request->input('address_two'),
            'customer_id' => $request->input('customer_id'),
            'ship_to' => $request->input('ship_to'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
            'tax_id' => $request->input('tax_id'),
            'tax_liability' => $request->input('tax_liability')
        ]);

        return redirect()->route('one-time-ship-to.index')->with('success', trans('One Time Ship To Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(OneTimeShipTo $oneTimeShipTo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OneTimeShipTo $oneTimeShipTo)
    {
        $customers = Customer::orderBy('name')->pluck('name', 'id');
        return view('one_time_ship.edit', compact('oneTimeShipTo', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OneTimeShipTo $oneTimeShipTo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OneTimeShipTo $oneTimeShipTo)
    {
        $oneTimeShipTo->delete();
        return redirect()->route('one-time-ship-to.index')->with('success', trans('One Time Ship To Deleted Successfully'));
    }

    private function validation(Request $request, $id = 0)
    {
        $request->validate([
            'contact' => ['required', 'string'],
            'name' => ['required', 'string'],
            'save_as' => ['required', 'string'],
            'address_one' => ['nullable', 'string'],
            'address_two' => ['nullable', 'string'],
            'customer_id' => ['nullable', 'integer'],
            'ship_to' => ['nullable', 'string'],
            'country' => ['nullable', 'integer'],
            'state' => ['nullable', 'integer'],
            'city' => ['nullable', 'integer'],
            'postal_code' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'fax' => ['nullable', 'string'],
            'tax_id' => ['nullable', 'string'],
            'tax_liability' => ['nullable', 'string'],
        ]);
    }
}
