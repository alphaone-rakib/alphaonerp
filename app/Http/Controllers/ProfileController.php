<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Models\Company;
use App\Models\BusinessRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Method to load view
     *
     * @access public
     * @return mixed
     */
    public function view()
    {
        $user = Auth::user()->id;
        $user = User::find($user);
        $getLang = $this->getLang();

        $countryName = DB::table('countries')->where('id', $user->country)->first();
        $stateName = DB::table('states')->where('id', $user->state)->first();
        $cityName = DB::table('cities')->where('id', $user->city)->first();

        $companyNames = Company::with('plants')->where('enabled', 1)->orderBy('name')->get();

        $selectedCompany = array();
        $selectedPlant = array();
        foreach ($user->companies as $company) {
            $selectedCompany[] = $company->id;
        }
        foreach ($user->plants as $plant) {
            $selectedPlant[] = $plant->id;
        }

        return view('profile.view', compact('user', 'countryName', 'stateName', 'cityName', 'getLang', 'companyNames', 'selectedCompany', 'selectedPlant'));
    }

    public function setting()
    {
        $getLang = $this->getLang();
        $countriesList = DB::table('countries')->pluck('name', 'id');

        $user = User::find(Auth::user()->id);

        $countryName = DB::table('countries')->where('id', $user->country)->first();
        $stateName = DB::table('states')->where('id', $user->state)->first();
        $cityName = DB::table('cities')->where('id', $user->city)->first();

        $companyNames = Company::with('plants')->where('enabled', 1)->orderBy('name')->get();

        $selectedCompany = array();
        $selectedPlant = array();
        foreach ($user->companies as $company) {
            $selectedCompany[] = $company->id;
        }
        foreach ($user->plants as $plant) {
            $selectedPlant[] = $plant->id;
        }


        return view('profile.setting', compact('user', 'countriesList', 'getLang'));
    }

    /**
     * Method to update setting
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function updateSetting(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
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
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'language' => ['required', 'string']
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('profile.view')->with('success', 'Account Settings Updated successfully');
    }

    public function password()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.changepassword', compact('user'));
    }

    /**
     * Method to update password
     *
     * @param Request $request
     * @access public
     * @return mixed
     */
    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success", "Password Changed successfully !");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
