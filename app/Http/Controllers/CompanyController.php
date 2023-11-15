<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Company;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\ApplicationSetting;
use App\Models\Plant;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
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
        return view('companies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countriesList = DB::table('countries')->pluck('name', 'id');
        $currencies = config('money');
        $currencies = $currencies['currencies'];
        $getLang = $this->getLang();
        $timezone = $this->timeZones();
        return view('companies.create', compact('countriesList', 'currencies', 'timezone', 'getLang'));
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

        if ($request->tax_id) {
            $query->whereHas('tax_id', function ($q) use ($request) {
                $q->where('value', 'like', '%' . $request->tax_id . '%');
            });
        }
        return $query;
    }

    public function selectedStateData(Request $request)
    {
        $tableId = $request->countryId;
        $states = DB::table('states')->where('country_id', $tableId)->pluck('name', 'id');
        $cities = DB::table('cities')->where('country_id', $tableId)->pluck('name', 'id');
        $response['states'] = $states;
        $response['cities'] = $cities;

        return response()->json($response);
    }

    public function selectedCityData(Request $request)
    {
        $tableId = $request->stateId;
        $cities = DB::table('cities')->where('state_id', $tableId)->pluck('name', 'id');
        return response()->json($cities);
    }

    /**
     * Show data for the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function code(Request $request)
    {
        $json = new \stdClass();
        $code = request('code');
        if ($code) {
            $currency = config('money');
            $currency = $currency['currencies'][$code];
            $currency['rate'] = isset($currency['rate']) ? $currency['rate'] : null;
            $currency['currency_symbol_first'] = $currency['symbol_first'] ? 1 : 0;
            $json = (object) $currency;
        }
        return response()->json($json);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'currency_code' => ['required', 'string'],
            'currency_name' => ['required', 'string'],
            // 'decimal_precision' => ['nullable', 'string'],
            // 'decimal_mark' => ['nullable', 'string'],
            'currency_symbol' => ['required', 'string'],
            'currency_symbol_first' => ['required', 'string'],
            'federal_id' => ['nullable', 'string'],
            'tax_id' => ['nullable', 'string'],
            'fiscal_calendar' => ['nullable', 'string'],
            'production_calendar' => ['nullable', 'string'],
            'language' => ['required', 'string'],
            'date_format' => ['required', 'string'],
            'date_separator' => ['required', 'string'],
            'time_format' => ['required', 'string'],
            'time_decorations' => ['required', 'string'],
            'logo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ]);

        $logoUrl = '';
        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $logoNewName = time() . $logo->getClientOriginalName();
            $logo->move('uploads/companies', $logoNewName);
            $logoUrl = 'uploads/companies/' . $logoNewName;
        }

        $company = Company::create([
            'name' => $request->input('name'),
            'enabled' => 1
        ]);

        $company->users()->attach(auth()->user()->id);

        $rows = [
            [
                'company_id' => $company->id,
                'key' => 'general.phone',
                'value' => $request->input('phone'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.fax',
                'value' => $request->input('fax'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.url',
                'value' => $request->input('url'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.country',
                'value' => $request->input('country'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.state',
                'value' => $request->input('state'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.city',
                'value' => $request->input('city'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.zip_code',
                'value' => $request->input('zip_code'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.company_address_one',
                'value' => $request->input('company_address_one'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.company_address_two',
                'value' => $request->input('company_address_two'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.currency_code',
                'value' => $request->input('currency_code'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.currency_name',
                'value' => $request->input('currency_name'),
            ],
            // [
            //     'company_id' => $company->id,
            //     'key' => 'general.decimal_precision',
            //     'value' => $request->input('decimal_precision'),
            // ],
            // [
            //     'company_id' => $company->id,
            //     'key' => 'general.currency_decimal_mark',
            //     'value' => $request->input('decimal_mark'),
            // ],
            [
                'company_id' => $company->id,
                'key' => 'general.currency_symbol',
                'value' => $request->input('currency_symbol'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.currency_symbol_first',
                'value' => $request->input('currency_symbol_first'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.federal_id',
                'value' => $request->input('federal_id'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.tax_id',
                'value' => $request->input('tax_id'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.fiscal_calendar',
                'value' => $request->input('fiscal_calendar'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.production_calendar',
                'value' => $request->input('production_calendar'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.language',
                'value' => $request->input('language'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.date_format',
                'value' => $request->input('date_format'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.date_separator',
                'value' => $request->input('date_separator'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.time_format',
                'value' => $request->input('time_format'),
            ],
            [
                'company_id' => $company->id,
                'key' => 'general.time_decorations',
                'value' => $request->input('time_decorations'),
            ],

        ];

        foreach ($rows as $row) {
            Setting::create($row);
        }

        if ($logoUrl != "") {

            $photoRows = [
                [
                    'company_id' => $company->id,
                    'key' => 'general.company_logo',
                    'value' => $logoUrl,
                ],
            ];

            foreach ($photoRows as $row) {
                Setting::create($row);
            }
        }

        session()->flash('success', trans('Company Created Successfully'));
        return redirect()->route('company.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->setSettings();

        $getLang = $this->getLang();

        $countryName = DB::table('countries')->where('id', $company->country)->first();
        $stateName = DB::table('states')->where('id', $company->state)->first();
        $cityName = DB::table('cities')->where('id', $company->city)->first();


        $country = $countryName->name;
        $state = $stateName->name;
        $city = $cityName->name;
        $lang = $getLang[$company->language];


        return view('companies.show', compact('company', 'country', 'state', 'city', 'getLang', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $company->setSettings();
        $countriesList = DB::table('countries')->pluck('name', 'id');
        $currencies = config('money');
        $getLang = $this->getLang();
        $timezone = $this->timeZones();
        $plants = Plant::where('enabled', 1)->pluck('name', 'id');
        return view('companies.edit', compact('countriesList', 'currencies', 'timezone', 'getLang', 'company', 'plants'));
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
            'currency_code' => ['required', 'string'],
            'currency_name' => ['required', 'string'],
            // 'decimal_precision' => ['nullable', 'string'],
            // 'decimal_mark' => ['nullable', 'string'],
            'currency_symbol' => ['required', 'string'],
            'currency_symbol_first' => ['required', 'string'],
            'federal_id' => ['nullable', 'string'],
            'tax_id' => ['nullable', 'string'],
            'fiscal_calendar' => ['nullable', 'string'],
            'production_calendar' => ['nullable', 'string'],
            'language' => ['required', 'string'],
            'date_format' => ['required', 'string'],
            'date_separator' => ['required', 'string'],
            'time_format' => ['required', 'string'],
            'time_decorations' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ]);

        $logoUrl = '';
        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $logoNewName = time() . $logo->getClientOriginalName();
            $logo->move('uploads/companies', $logoNewName);
            $logoUrl = 'uploads/companies/' . $logoNewName;
        }
        DB::beginTransaction();
        try {
            $company->name = $request->input('name');
            $company->enabled = $request->input('enabled');
            $company->save();

            if ($logoUrl != "") {
                if (Setting::where('key', 'general.company_logo')->where('company_id', $company->id)->count() > 0) {
                    DB::table('settings')->where('company_id', $company->id)->where('key', 'general.company_logo')->update(['value' => $logoUrl]);
                } else {
                    Setting::create(['company_id' => $company->id, 'key' => 'general.company_logo', 'value' => $logoUrl]);
                }
            }

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

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.currency_code')
                ->update(['value' => $request->input('currency_code')]);


            // DB::table('settings')->where('company_id', $company->id)
            //     ->where('key', 'general.decimal_precision')
            //     ->update(['value' => $request->input('decimal_precision')]);

            // DB::table('settings')->where('company_id', $company->id)
            //     ->where('key', 'general.currency_decimal_mark')
            //     ->update(['value' => $request->input('decimal_mark')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.currency_symbol')
                ->update(['value' => $request->input('currency_symbol')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.currency_symbol_first')
                ->update(['value' => $request->input('currency_symbol_first')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.federal_id')
                ->update(['value' => $request->input('federal_id')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.tax_id')
                ->update(['value' => $request->input('tax_id')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.fiscal_calendar')
                ->update(['value' => $request->input('fiscal_calendar')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.production_calendar')
                ->update(['value' => $request->input('production_calendar')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.language')
                ->update(['value' => $request->input('language')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.date_format')
                ->update(['value' => $request->input('date_format')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.date_separator')
                ->update(['value' => $request->input('date_separator')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.time_format')
                ->update(['value' => $request->input('time_format')]);

            DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.time_decorations')
                ->update(['value' => $request->input('time_decorations')]);

            DB::commit();
            return redirect()->route('company.index')->with('success', trans('Company Updated Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        DB::beginTransaction();
        try {
            $company->delete();
            DB::table('settings')->where('company_id', $company->id)->delete();
            DB::commit();
            return redirect()->route('company.index')->with('success', trans('Company Deleted Successfully'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e);
        }
    }
}
