<?php

namespace App\Http\Controllers;

use App\Models\BusinessRole;
use App\Models\Company;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('users.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = User::latest();

        if ($request->email)
            $query->where('email', 'like', '%' . $request->email . '%');

        if ($request->cell_phone)
            $query->where('cell_phone', 'like', '%' . $request->cell_phone . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countriesList = DB::table('countries')->pluck('name', 'id');
        $getLang = $this->getLang();
        return view('users.create', compact('countriesList', 'getLang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => ['required', 'string'],
            'f_name' => ['required', 'string'],
            'm_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'address_one' => ['nullable', 'string'],
            'address_two' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['nullable', 'string'],
            'office_phone' => ['nullable', 'string'],
            'cell_phone' => ['nullable', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'same:password_confirmation'],
            'language' => ['required', 'string']
        ]);

        $input = array();
        $input['user_id'] = $request->user_id;
        $input['f_name'] = $request->f_name;
        $input['m_name'] = $request->m_name;
        $input['l_name'] = $request->l_name;
        $input['address_one'] = $request->address_one;
        $input['address_two'] = $request->address_two;
        $input['country'] = $request->country;
        $input['state'] = $request->state;
        $input['city'] = $request->city;
        $input['zip_code'] = $request->zip_code;
        $input['office_phone'] = $request->office_phone;
        $input['cell_phone'] = $request->cell_phone;
        $input['email'] = $request->email;
        $input['password'] = bcrypt($request->password);
        $input['language'] = $request->language;
        $input['enabled'] = 1;
        $input['locked'] = 1;
        $user = User::create($input);

        return redirect()->route('user.index')->with('success', trans('User Created Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $countriesList = DB::table('countries')->pluck('name', 'id');
        $user = User::find($id);

        $countryName = DB::table('countries')->where('id', $user->country)->first();
        $stateName = DB::table('states')->where('id', $user->state)->first();
        $cityName = DB::table('cities')->where('id', $user->city)->first();

        $getLang = $this->getLang();

        $roleNames = BusinessRole::where('enabled', 1)->orderBy('name')->pluck('name', 'id');

        $roles = array();
        foreach ($user->businessRoles as $key => $value) {
            $roles[] = $value->id;
        }

        $companyNames = Company::with('plants')->where('enabled', 1)->orderBy('name')->get();

        $selectedCompany = array();
        $selectedPlant = array();
        foreach ($user->companies as $company) {
            $selectedCompany[] = $company->id;
        }
        foreach ($user->plants as $plant) {
            $selectedPlant[] = $plant->id;
        }


        return view('users.edit', compact('selectedCompany', 'selectedPlant', 'user', 'countryName', 'stateName', 'cityName', 'countriesList', 'getLang', 'roleNames', 'roles', 'companyNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'user_id' => ['required', 'string'],
            'f_name' => ['required', 'string'],
            'm_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'address_one' => ['nullable', 'string'],
            'address_two' => ['nullable', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'zip_code' => ['nullable', 'string'],
            'office_phone' => ['nullable', 'string'],
            'cell_phone' => ['nullable', 'string'],
            'email' => ['required', 'string'],
            'language' => ['required', 'string']
        ]);
        $user = User::find($id);
        $data = $request->only(['user_id', 'f_name', 'm_name', 'l_name', 'address_one', 'address_two', 'country', 'state', 'city', 'zip_code', 'office_phone', 'cell_phone', 'email', 'language']);
        $user->update($data);
        return redirect()->route('user.index')->with('success', trans('User Updated Successfully'));
    }

    public function assignBusinessProfile(Request $request, string $id)
    {
        $request->validate([
            'assign_business_role' => ['required', 'array']
        ]);
        $user = User::find($id);
        $user->businessRoles()->sync($request->input('assign_business_role'));
        return redirect()->route('user.index')->with('success', trans('User Assign Business Role Updated Successfully'));
    }

    public function assignCompany(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'company' => ['required', 'array'],
            'plants' => ['required', 'array']
        ]);

        $plantCompany = array();
        $requestCompany = array();

        foreach ($request->plants as $plant) {
            $cPlant = Plant::find($plant);
            $plantCompany[] = $cPlant->company->id;
        }
        foreach ($request->company as $com) {
            $requestCompany[] = intval($com);
        }

        $company = array_unique(array_merge($plantCompany, $requestCompany));

        $user = User::find($id);
        $user->companies()->sync($company);
        $user->plants()->sync($request->plants);
        return redirect()->route('user.index')->with('success', trans('User Assign Company Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', trans('User Deleted Successfully'));
    }
}
