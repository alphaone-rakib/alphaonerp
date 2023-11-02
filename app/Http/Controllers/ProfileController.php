<?php

namespace App\Http\Controllers;

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
