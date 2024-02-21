<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Customer;
use App\Models\OneTimeShipTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('quotes.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Quote::latest();

        if ($request->quote_entry)
            $query->where('quote_entry', 'like', '%' . $request->quote_entry . '%');

        if ($request->sold_to_customer_id)
            $query->where('sold_to_customer_id', 'like', '%' . $request->sold_to_customer_id . '%');

        if ($request->ship_to_customer_id)
            $query->where('ship_to_customer_id', 'like', '%' . $request->ship_to_customer_id . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        $oneTimeShipData = OneTimeShipTo::orderBy('name')->get();
        $countriesList = DB::table('countries')->pluck('name', 'id');
        return view('quotes.create', compact('customers', 'countriesList', 'oneTimeShipData'));
    }

    public function selectedSoldCustomerId(Request $request)
    {
        $tableId = $request->sold_customer_id;
        $allCustomers = Customer::orderBy('name')->get();
        $selectedCustomer = Customer::where('id', $tableId)->first();

        $response['allCustomers'] = $allCustomers;
        $response['selectedCustomer'] = $selectedCustomer;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quote_entry' => ['required', 'string', 'max:255'],
            'sold_to_customer_id' => ['required', 'string', 'max:255'],
            'sold_to_customer_name_address' => ['required', 'string', 'max:255'],
            'one_time_ship_address' => ['nullable', 'string', 'max:255'],
            'ship_to_customer_id' => ['nullable', 'string', 'max:255'],
            'ship_to_customer_name_address' => ['required', 'string', 'max:255'],
            'bill_to_customer' => ['required', 'string', 'max:255'],
            'bill_to_po' => ['nullable', 'string', 'max:255'],
            'ship_via' => ['nullable', 'string', 'max:255'],
            'bill_to_open' => ['nullable', 'string', 'max:255'],
            'terms' => ['nullable', 'string', 'max:255'],
            'bill_to_due' => ['nullable', 'string', 'max:255'],
            'disc' => ['nullable', 'string', 'max:255'],
            'bill_to_days_open' => ['nullable', 'string', 'max:255'],
            'territory' => ['nullable', 'string', 'max:255'],
            'primary_sales' => ['nullable', 'string', 'max:255'],
            'rating' => ['nullable', 'string', 'max:255'],
            'best_case' => ['nullable', 'string', 'max:255'],
            'worst_case' => ['nullable', 'string', 'max:255'],
            'confidence' => ['nullable', 'string', 'max:255'],
            'gross_value' => ['nullable', 'string', 'max:255'],
            'discount_percentage' => ['nullable', 'string', 'max:255'],
            'discount_value' => ['nullable', 'string', 'max:255'],
            'rounding' => ['nullable', 'string', 'max:255'],
            'potential' => ['nullable', 'string', 'max:255'],
            'misc_charges' => ['nullable', 'string', 'max:255'],
            'tax' => ['nullable', 'string', 'max:255'],
            'total' => ['required', 'string', 'max:255'],
            'summary_best_case_percentage' => ['nullable', 'string', 'max:255'],
            'summary_best_case_value' => ['nullable', 'string', 'max:255'],
            'summary_worst_case_percentage' => ['nullable', 'string', 'max:255'],
            'summary_worst_case_value' => ['nullable', 'string', 'max:255'],
            'summary_exptected_percentage' => ['nullable', 'string', 'max:255'],
            'summary_exptected_value' => ['nullable', 'string', 'max:255'],
        ]);

        $data = $request->only(['quote_entry', 'sold_to_customer_id', 'sold_to_customer_name_address', 'ship_to_customer_id', 'one_time_ship_id', 'ship_to_customer_name_address', 'bill_to_customer', 'bill_to_po', 'ship_via', 'bill_to_open', 'terms', 'bill_to_due', 'disc', 'bill_to_days_open', 'territory', 'primary_sales', 'best_case', 'rating', 'worst_case', 'confidence', 'gross_value', 'discount_percentage', 'discount_value', 'rounding', 'potential', 'misc_charges', 'tax', 'total', 'summary_best_case_percentage', 'summary_best_case_value', 'summary_worst_case_percentage', 'summary_worst_case_value', 'summary_exptected_percentage', 'summary_exptected_value']);
        $data['user_id'] = auth()->user()->id;

        if ($request->has('one_time_ship_address')) {
            $data['one_time_ship_address'] = 1;
            $request->validate([
                'one_time_ship_id_checked' => ['required', 'string', 'max:255'],
            ]);

            $data['one_time_ship_id'] = $request->one_time_ship_id_checked;
        } else {
            $data['one_time_ship_address'] = 0;

            $request->validate([
                'one_time_ship_id' => ['required', 'string', 'max:255'],
            ]);

            $data['one_time_ship_id'] = $request->one_time_ship_id;
        }

        DB::transaction(function () use ($data, $request) {
            Quote::create($data);
        });

        return redirect()->route('quote.index')->with('success', trans('Quote Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
