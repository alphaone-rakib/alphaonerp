<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('customer.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Customer::latest();

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        if ($request->email)
            $query->where('email', 'like', '%' . $request->email . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = config('money');
        $currencies = $currencies['currencies'];
        $countriesList = DB::table('countries')->pluck('name', 'id');
        return view('customer.create', compact('countriesList', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);

        if (isset($request->same_as_customer_info) && !empty($request->same_as_customer_info)) {
            Customer::create([
                'name' => $request->input('name'),
                'address_one' => $request->input('address_one'),
                'address_two' => $request->input('address_two'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('city'),
                'zip_code' => $request->input('zip_code'),
                'phone' => $request->input('phone'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'url' => $request->input('url'),
                'ship_address_one' => $request->input('address_one'),
                'ship_address_two' => $request->input('address_two'),
                'ship_country' => $request->input('country'),
                'ship_state' => $request->input('state'),
                'ship_city' => $request->input('city'),
                'ship_zip_code' => $request->input('zip_code'),
                'ship_phone' => $request->input('phone'),
                'ship_fax' => $request->input('fax')
            ]);
        } else {
            Customer::create([
                'name' => $request->input('name'),
                'address_one' => $request->input('address_one'),
                'address_two' => $request->input('address_two'),
                'country' => $request->input('country'),
                'state' => $request->input('state'),
                'city' => $request->input('city'),
                'zip_code' => $request->input('zip_code'),
                'phone' => $request->input('phone'),
                'fax' => $request->input('fax'),
                'email' => $request->input('email'),
                'url' => $request->input('url'),
                'ship_address_one' => $request->input('ship_address_one'),
                'ship_address_two' => $request->input('ship_address_two'),
                'ship_country' => $request->input('ship_country'),
                'ship_state' => $request->input('ship_state'),
                'ship_city' => $request->input('ship_city'),
                'ship_zip_code' => $request->input('ship_zip_code'),
                'ship_phone' => $request->input('ship_phone'),
                'ship_fax' => $request->input('ship_fax')
            ]);
        }

        return redirect()->route('customer.index')->with('success', trans('Customer Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $countryName = DB::table('countries')->where('id', $customer->country)->first();
        $stateName = DB::table('states')->where('id', $customer->state)->first();
        $cityName = DB::table('cities')->where('id', $customer->city)->first();

        $shipCountryName = DB::table('countries')->where('id', $customer->ship_country)->first();
        $shipStateName = DB::table('states')->where('id', $customer->ship_state)->first();
        $shipCityName = DB::table('cities')->where('id', $customer->ship_city)->first();

        // dd($shipCountryName);
        return view('customer.show', compact('customer', 'countryName', 'stateName', 'cityName', 'shipCountryName', 'shipStateName', 'shipCityName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $countriesList = DB::table('countries')->pluck('name', 'id');

        $countryName = DB::table('countries')->where('id', $customer->country)->first();
        $stateName = DB::table('states')->where('id', $customer->state)->first();
        $cityName = DB::table('cities')->where('id', $customer->city)->first();

        $currencies = config('money');
        $currencies = $currencies['currencies'];

        $customerGroupList = CustomerGroup::pluck('group_name', 'id');

        return view('customer.edit', compact('currencies', 'customerGroupList', 'customer', 'countriesList', 'countryName', 'stateName', 'cityName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address_one' => ['nullable', 'string'],
            'address_two' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'fax' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'url' => ['nullable', 'string']
        ]);
        $data = $request->only(['name', 'address_one', 'address_two', 'country', 'state', 'city', 'zip_code', 'phone', 'fax', 'email', 'url']);
        $customer->update($data);
        return redirect()->route('customer.index')->with('success', trans('Customer Info Updated Successfully'));
    }

    public function shippingUpdate(Request $request, string $id)
    {
        $request->validate([
            'ship_address_one' => ['nullable', 'string'],
            'ship_address_two' => ['nullable', 'string'],
            'ship_country' => ['required', 'string'],
            'ship_state' => ['required', 'string'],
            'ship_city' => ['nullable', 'string'],
            'ship_zip_code' => ['nullable', 'string'],
            'ship_phone' => ['nullable', 'string'],
            'ship_fax' => ['nullable', 'string']
        ]);
        $data = $request->only(['ship_address_one', 'ship_address_two', 'ship_country', 'ship_state', 'ship_city', 'ship_zip_code', 'ship_phone', 'ship_fax']);
        $customer = Customer::find($id);
        $customer->update($data);
        return redirect()->route('customer.index')->with('success', trans('Customer Ship Info Updated Successfully'));
    }

    public function billUpdate(Request $request, string $id)
    {
        $request->validate([
            'bill_currency_id' => ['nullable', 'string'],
            'bill_customer_group_id' => ['nullable', 'string'],
            'bill_payment_method_id' => ['required', 'string'],
            'bill_federal_id' => ['required', 'string'],
            'bill_terms_id' => ['nullable', 'string'],
            'bill_terms_type' => ['nullable', 'string'],
            'bill_ship_via' => ['nullable', 'string'],
            'bill_fob' => ['nullable', 'string'],
            'bill_tax_id' => ['nullable', 'string']
        ]);
        $data = $request->only(['bill_currency_id', 'bill_customer_group_id', 'bill_payment_method_id', 'bill_federal_id', 'bill_terms_id', 'bill_terms_type', 'bill_ship_via', 'bill_fob', 'bill_tax_id']);
        $customer = Customer::find($id);
        $customer->update($data);
        return redirect()->route('customer.index')->with('success', trans('Customer Bill Info Updated Successfully'));
    }

    public function accountUpdate(Request $request, string $id)
    {
        $request->validate([
            'contact_name' => ['nullable', 'string'],
            'contact_title' => ['nullable', 'string'],
            'contact_email' => ['nullable', 'string'],
            'contact_phone' => ['nullable', 'string'],
            'contact_cell_phone' => ['nullable', 'string'],
            'billing' => ['nullable', 'string'],
            'purchasing' => ['nullable', 'string'],
            'shipping' => ['nullable', 'string'],
        ]);
        DB::beginTransaction();
        try {

            $customer = Customer::find($id);
            $data = $request->only(['contact_name', 'contact_title', 'contact_email', 'contact_phone', 'contact_cell_phone']);

            if (isset($request->billing) && !empty($request->billing)) {
                if ($request->billing == "1") {
                    $data['billing'] = "1";
                }
            } else {
                $data['billing'] = "0";
            }

            if (isset($request->purchasing) && !empty($request->purchasing)) {
                if ($request->purchasing == "1") {
                    $data['purchasing'] = "1";
                }
            } else {
                $data['purchasing'] = "0";
            }

            if (isset($request->shipping) && !empty($request->shipping)) {
                if ($request->shipping == "1") {
                    $data['shipping'] = "1";
                }
            } else {
                $data['shipping'] = "0";
            }

            $customer->update($data);

            DB::commit();
            return redirect()->route('customer.index')->with('success', trans('Customer Contact Info Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    private function validation(Request $request, $id = 0)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'address_one' => ['nullable', 'string'],
            'address_two' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'fax' => ['nullable', 'string'],
            'email' => ['nullable', 'string'],
            'url' => ['nullable', 'string'],
            'ship_address_one' => ['nullable', 'string'],
            'ship_address_two' => ['nullable', 'string'],
            'ship_country' => ['required', 'string'],
            'ship_state' => ['required', 'string'],
            'ship_city' => ['nullable', 'string'],
            'ship_zip_code' => ['nullable', 'string'],
            'ship_phone' => ['nullable', 'string'],
            'ship_fax' => ['nullable', 'string'],
        ]);
    }
}
