<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Plant;
use App\Models\Company;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        foreach ($data as $company) {
            $company->setSettings();
        }
        return view('company-configuration.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Company::latest();
        if ($request->company_name)
            $query->where('name', 'like', '%' . $request->company_name . '%');

        if ($request->phone) {
            $query->whereHas('settings', function ($q) use ($request) {
                $q->where('value', 'like', '%' . $request->phone . '%');
            });
        }
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        $company->setSettings();
        $getLang = $this->getLang();

        $countryName = DB::table('countries')->where('id', $company->country)->first();
        $stateName = DB::table('states')->where('id', $company->state)->first();
        $cityName = DB::table('cities')->where('id', $company->city)->first();

        $country = $countryName->name;
        $state = $stateName->name;
        $city = $cityName->name;
        $lang = $getLang[$company->language];

        return view('company-configuration.show', compact('company', 'country', 'state', 'city', 'getLang', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        $company->setSettings();
        $countriesList = DB::table('countries')->pluck('name', 'id');
        $currencies = config('money');
        $getLang = $this->getLang();
        $timezone = $this->timeZones();
        $plants = Plant::where('enabled', 1)->pluck('name', 'id');
        return view('company-configuration.edit', compact('countriesList', 'currencies', 'timezone', 'getLang', 'company', 'plants'));
    }

    public function code(Request $request)
    {
        $json = new \stdClass();
        $code = request('code');
        if ($code) {
            $currency = config('money.' . $code);
            $currency['rate'] = isset($currency['rate']) ? $currency['rate'] : null;
            $currency['currency_symbol_first'] = $currency['symbol_first'] ? 1 : 0;
            $json = (object) $currency;
        }
        return response()->json($json);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'fax' => ['nullable', 'string'],
            'url' => ['nullable', 'url'],
            'country' => ['required', 'integer'],
            'state' => ['required', 'integer'],
            'city' => ['nullable', 'integer'],
            'zip_code' => ['nullable', 'string'],
            'company_address_one' => ['nullable', 'string'],
            'company_address_two' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $company->name = $request->input('name');
            $company->save();

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.phone')
                ->update(['value' => $request->input('phone')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.fax')
                ->update(['value' => $request->input('fax')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.url')
                ->update(['value' => $request->input('url')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.country')
                ->update(['value' => $request->input('country')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.state')
                ->update(['value' => $request->input('state')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.city')
                ->update(['value' => $request->input('city')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.zip_code')
                ->update(['value' => $request->input('zip_code')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.company_address_one')
                ->update(['value' => $request->input('company_address_one')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.company_address_two')
                ->update(['value' => $request->input('company_address_two')]);

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Basic Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function financeUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'initial_ar_no' => ['nullable', 'string'],
            'ar_prefix' => ['nullable', 'string'],
            'initial_ap_no' => ['nullable', 'string'],
            'ap_prefix' => ['nullable', 'string'],
            'accounts_payable' => ['nullable', 'string'],
            'accounts_receivable' => ['nullable', 'string'],
            'inventory' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (isset($request->inventory)) {
                if ($request->inventory == "1") {
                    if (Setting::where('key', '=', 'general.inventory')->where('company_id', $company->id)->count() > 0) {
                        DB::table('settings')->where('company_id', $company->id)
                            ->where('key', 'general.inventory')
                            ->update(['value' => "1"]);
                    } else {
                        Setting::create(['company_id' => $company->id, 'key' => 'general.inventory', 'value' => "1"]);
                    }
                }
            } else {
                if (Setting::where('key', '=', 'general.inventory')->where('company_id', $company->id)->count() > 0) {
                    DB::table('settings')->where('company_id', $company->id)
                        ->where('key', 'general.inventory')
                        ->update(['value' => "0"]);
                } else {
                    Setting::create(['company_id' => $company->id, 'key' => 'general.inventory', 'value' => "0"]);
                }
            }

            if (isset($request->accounts_payable)) {
                if ($request->accounts_payable == "1") {
                    if (Setting::where('key', '=', 'general.accounts_payable')->where('company_id', $company->id)->count() > 0) {
                        DB::table('settings')->where('company_id', $company->id)
                            ->where('key', 'general.accounts_payable')
                            ->update(['value' => "1"]);
                    } else {
                        Setting::create(['company_id' => $company->id, 'key' => 'general.accounts_payable', 'value' => "1"]);
                    }
                }
            } else {
                if (Setting::where('key', '=', 'general.accounts_payable')->where('company_id', $company->id)->count() > 0) {
                    DB::table('settings')->where('company_id', $company->id)
                        ->where('key', 'general.accounts_payable')
                        ->update(['value' => "0"]);
                } else {
                    Setting::create(['company_id' => $company->id, 'key' => 'general.accounts_payable', 'value' => "0"]);
                }
            }

            if (isset($request->accounts_receivable)) {
                if ($request->accounts_receivable == "1") {
                    if (Setting::where('key', '=', 'general.accounts_receivable')->where('company_id', $company->id)->count() > 0) {
                        DB::table('settings')->where('company_id', $company->id)
                            ->where('key', 'general.accounts_receivable')
                            ->update(['value' => "1"]);
                    } else {
                        Setting::create(['company_id' => $company->id, 'key' => 'general.accounts_receivable', 'value' => "1"]);
                    }
                }
            } else {
                if (Setting::where('key', '=', 'general.accounts_receivable')->where('company_id', $company->id)->count() > 0) {
                    DB::table('settings')->where('company_id', $company->id)
                        ->where('key', 'general.accounts_payable')
                        ->update(['value' => "0"]);
                } else {
                    Setting::create(['company_id' => $company->id, 'key' => 'general.accounts_payable', 'value' => "0"]);
                }
            }



            if ($request->accounts_payable == "1") {
                if (Setting::where('key', '=', 'general.accounts_payable')->where('company_id', $company->id)->count() > 0) {
                    DB::table('settings')->where('company_id', $company->id)
                        ->where('key', 'general.accounts_payable')
                        ->update(['value' => "1"]);
                } else {
                    Setting::create(['company_id' => $company->id, 'key' => 'general.accounts_payable', 'value' => "1"]);
                }
            } else {
                if (Setting::where('key', '=', 'general.accounts_payable')->where('company_id', $company->id)->count() > 0) {
                    DB::table('settings')->where('company_id', $company->id)
                        ->where('key', 'general.accounts_payable')
                        ->update(['value' => "0"]);
                } else {
                    Setting::create(['company_id' => $company->id, 'key' => 'general.accounts_payable', 'value' => "0"]);
                }
            }

            if (Setting::where('key', '=', 'general.initial_ar_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_ar_no')
                    ->update(['value' => $request->initial_ar_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_ar_no', 'value' => $request->initial_ar_no]);
            }

            if (Setting::where('key', '=', 'general.ar_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.ar_prefix')
                    ->update(['value' => $request->ar_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.ar_prefix', 'value' => $request->ar_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_ap_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_ap_no')
                    ->update(['value' => $request->initial_ap_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_ap_no', 'value' => $request->initial_ap_no]);
            }

            if (Setting::where('key', '=', 'general.ap_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.ap_prefix')
                    ->update(['value' => $request->ap_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.ap_prefix', 'value' => $request->ap_prefix]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Service Finance Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function serviceUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'initial_service_job_no' => ['nullable', 'string'],
            'service_job_prefix' => ['nullable', 'string'],
        ]);
        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (Setting::where('key', '=', 'general.initial_service_job_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_service_job_no')
                    ->update(['value' => $request->initial_service_job_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_service_job_no', 'value' => $request->initial_service_job_no]);
            }

            if (Setting::where('key', '=', 'general.service_job_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.service_job_prefix')
                    ->update(['value' => $request->service_job_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.service_job_prefix', 'value' => $request->service_job_prefix]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Service Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function productionUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'initial_job_no' => ['nullable', 'string'],
            'job_prefix' => ['nullable', 'string'],
        ]);
        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (Setting::where('key', '=', 'general.initial_job_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_job_no')
                    ->update(['value' => $request->initial_job_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_job_no', 'value' => $request->initial_job_no]);
            }

            if (Setting::where('key', '=', 'general.job_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.job_prefix')
                    ->update(['value' => $request->job_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.job_prefix', 'value' => $request->job_prefix]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Production Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function logisticUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'initial_packing_slip_no' => ['nullable', 'string'],
            'pack_slip_prefix' => ['nullable', 'string'],
            'initial_bol_no' => ['nullable', 'string'],
            'bol_prefix' => ['nullable', 'string'],
            'ship_via' => ['nullable', 'string'],
            'fob' => ['nullable', 'string'],
            'misc_freight' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (Setting::where('key', '=', 'general.misc_freight')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.misc_freight')
                    ->update(['value' => $request->misc_freight]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.misc_freight', 'value' => $request->misc_freight]);
            }

            if (Setting::where('key', '=', 'general.fob')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.fob')
                    ->update(['value' => $request->fob]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.fob', 'value' => $request->fob]);
            }

            if (Setting::where('key', '=', 'general.ship_via')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.ship_via')
                    ->update(['value' => $request->ship_via]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.ship_via', 'value' => $request->ship_via]);
            }

            if (Setting::where('key', '=', 'general.bol_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.bol_prefix')
                    ->update(['value' => $request->bol_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.bol_prefix', 'value' => $request->bol_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_bol_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_bol_no')
                    ->update(['value' => $request->initial_bol_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_bol_no', 'value' => $request->initial_bol_no]);
            }

            if (Setting::where('key', '=', 'general.initial_packing_slip_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_packing_slip_no')
                    ->update(['value' => $request->initial_packing_slip_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_packing_slip_no', 'value' => $request->initial_packing_slip_no]);
            }

            if (Setting::where('key', '=', 'general.pack_slip_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.pack_slip_prefix')
                    ->update(['value' => $request->pack_slip_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.pack_slip_prefix', 'value' => $request->pack_slip_prefix]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Logistic Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function inventoryUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'warehouse_general' => ['nullable', 'string'],
            'warehouse_general_bin' => ['nullable', 'string'],
            'warehouse_receiving' => ['nullable', 'string'],
            'warehouse_receiving_bin' => ['nullable', 'string'],
            'warehouse_shipping' => ['nullable', 'string'],
            'warehouse_shipping_bin' => ['nullable', 'string'],
            'default_plant' => ['nullable', 'string'],
            'costing_method' => ['nullable', 'string'],
            'initial_transfer_order_no' => ['nullable', 'string'],
            'transfer_order_prefix' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (Setting::where('key', '=', 'general.transfer_order_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.transfer_order_prefix')
                    ->update(['value' => $request->transfer_order_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.transfer_order_prefix', 'value' => $request->transfer_order_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_transfer_order_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_transfer_order_no')
                    ->update(['value' => $request->initial_transfer_order_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_transfer_order_no', 'value' => $request->initial_transfer_order_no]);
            }

            if (Setting::where('key', '=', 'general.default_plant')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.default_plant')
                    ->update(['value' => $request->default_plant]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.default_plant', 'value' => $request->default_plant]);
            }

            if (Setting::where('key', '=', 'general.costing_method')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.costing_method')
                    ->update(['value' => $request->costing_method]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.costing_method', 'value' => $request->costing_method]);
            }

            if (Setting::where('key', '=', 'general.warehouse_shipping_bin')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.warehouse_shipping_bin')
                    ->update(['value' => $request->warehouse_shipping_bin]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.warehouse_shipping_bin', 'value' => $request->warehouse_shipping_bin]);
            }

            if (Setting::where('key', '=', 'general.warehouse_shipping')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.warehouse_shipping')
                    ->update(['value' => $request->warehouse_shipping]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.warehouse_shipping', 'value' => $request->warehouse_shipping]);
            }

            if (Setting::where('key', '=', 'general.warehouse_general')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.warehouse_general')
                    ->update(['value' => $request->warehouse_general]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.warehouse_general', 'value' => $request->warehouse_general]);
            }

            if (Setting::where('key', '=', 'general.warehouse_general_bin')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.warehouse_general_bin')
                    ->update(['value' => $request->warehouse_general_bin]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.warehouse_general_bin', 'value' => $request->warehouse_general_bin]);
            }

            if (Setting::where('key', '=', 'general.warehouse_receiving')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.warehouse_receiving')
                    ->update(['value' => $request->warehouse_receiving]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.warehouse_receiving', 'value' => $request->warehouse_receiving]);
            }

            if (Setting::where('key', '=', 'general.warehouse_receiving_bin')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.warehouse_receiving_bin')
                    ->update(['value' => $request->warehouse_receiving_bin]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.warehouse_receiving_bin', 'value' => $request->warehouse_receiving_bin]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Inventory Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function purchaseUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'initial_purchase_order_no' => ['nullable', 'string'],
            'purchase_order_prefix' => ['nullable', 'string'],
            'initial_requisition_no' => ['nullable', 'string'],
            'requisition_prefix' => ['nullable', 'string'],
            'initial_vendor_no' => ['nullable', 'string'],
            'vendor_prefix' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (Setting::where('key', '=', 'general.vendor_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.vendor_prefix')
                    ->update(['value' => $request->vendor_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.vendor_prefix', 'value' => $request->vendor_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_vendor_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_vendor_no')
                    ->update(['value' => $request->initial_vendor_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_vendor_no', 'value' => $request->initial_vendor_no]);
            }

            if (Setting::where('key', '=', 'general.requisition_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.requisition_prefix')
                    ->update(['value' => $request->requisition_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.requisition_prefix', 'value' => $request->requisition_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_requisition_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_requisition_no')
                    ->update(['value' => $request->initial_requisition_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_requisition_no', 'value' => $request->initial_requisition_no]);
            }

            if (Setting::where('key', '=', 'general.initial_purchase_order_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_purchase_order_no')
                    ->update(['value' => $request->initial_purchase_order_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_purchase_order_no', 'value' => $request->initial_purchase_order_no]);
            }

            if (Setting::where('key', '=', 'general.purchase_order_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.purchase_order_prefix')
                    ->update(['value' => $request->purchase_order_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.purchase_order_prefix', 'value' => $request->purchase_order_prefix]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Purchase Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    public function salesUpdate(Request $request, $id = 0)
    {
        $request->validate([
            'initial_quote_no' => ['nullable', 'string'],
            'quote_prefix' => ['nullable', 'string'],
            'expiration_days' => ['nullable', 'string'],
            'follow_up_days' => ['nullable', 'string'],
            'days_to_quote' => ['nullable', 'string'],
            'quote_form_messages' => ['nullable', 'string'],
            'initial_order_no' => ['nullable', 'string'],
            'order_prefix' => ['nullable', 'string'],
            'initial_rma_no' => ['nullable', 'string'],
            'rma_prefix' => ['nullable', 'string'],
            'initial_customer_no' => ['nullable', 'string'],
            'customer_prefix' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();
        try {
            $company = Company::find($id);

            if (Setting::where('key', '=', 'general.customer_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.customer_prefix')
                    ->update(['value' => $request->customer_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.customer_prefix', 'value' => $request->customer_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_customer_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_customer_no')
                    ->update(['value' => $request->initial_customer_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_customer_no', 'value' => $request->initial_customer_no]);
            }

            if (Setting::where('key', '=', 'general.rma_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.rma_prefix')
                    ->update(['value' => $request->rma_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.rma_prefix', 'value' => $request->rma_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_rma_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_rma_no')
                    ->update(['value' => $request->initial_rma_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_rma_no', 'value' => $request->initial_rma_no]);
            }

            if (Setting::where('key', '=', 'general.order_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.order_prefix')
                    ->update(['value' => $request->order_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.order_prefix', 'value' => $request->order_prefix]);
            }

            if (Setting::where('key', '=', 'general.initial_order_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_order_no')
                    ->update(['value' => $request->initial_order_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_order_no', 'value' => $request->initial_order_no]);
            }

            if (Setting::where('key', '=', 'general.initial_quote_no')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.initial_quote_no')
                    ->update(['value' => $request->initial_quote_no]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.initial_quote_no', 'value' => $request->initial_quote_no]);
            }

            if (Setting::where('key', '=', 'general.quote_prefix')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.quote_prefix')
                    ->update(['value' => $request->quote_prefix]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.quote_prefix', 'value' => $request->quote_prefix]);
            }

            if (Setting::where('key', '=', 'general.expiration_days')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.expiration_days')
                    ->update(['value' => $request->expiration_days]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.expiration_days', 'value' => $request->expiration_days]);
            }

            if (Setting::where('key', '=', 'general.follow_up_days')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.follow_up_days')
                    ->update(['value' => $request->follow_up_days]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.follow_up_days', 'value' => $request->follow_up_days]);
            }

            if (Setting::where('key', '=', 'general.days_to_quote')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.days_to_quote')
                    ->update(['value' => $request->days_to_quote]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.days_to_quote', 'value' => $request->days_to_quote]);
            }

            if (Setting::where('key', '=', 'general.quote_form_messages')->where('company_id', $company->id)->count() > 0) {
                DB::table('settings')->where('company_id', $company->id)
                    ->where('key', 'general.quote_form_messages')
                    ->update(['value' => $request->quote_form_messages]);
            } else {
                Setting::create(['company_id' => $company->id, 'key' => 'general.quote_form_messages', 'value' => $request->quote_form_messages]);
            }

            DB::commit();
            return redirect()->route('company-configuration.index')->with('success', trans('Company Configuration Sales Information Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
