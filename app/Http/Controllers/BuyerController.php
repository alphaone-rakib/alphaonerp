<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('buyers.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Buyer::latest();

        if ($request->person_contact)
            $query->where('person_contact', 'like', '%' . $request->person_contact . '%');

        if ($request->buyer_email)
            $query->where('buyer_email', 'like', '%' . $request->buyer_email . '%');

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $data = $request->only(['f_name', 'l_name', 'buyer_email']);
        $data['person_contact'] = $request->f_name . $request->l_name;
        $data['user_id'] = auth()->user()->id;
        DB::transaction(function () use ($data, $request) {
            Buyer::create($data);
        });
        return redirect()->route('buyer.index')->with('success', trans('Buyer Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buyer $buyer)
    {
        return view('buyers.edit', compact('buyer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buyer $buyer)
    {
        $this->validation($request);
        $data = $request->only(['f_name', 'l_name', 'buyer_email']);
        $data['person_contact'] = $request->f_name . $request->l_name;
        $data['user_id'] = auth()->user()->id;
        DB::transaction(function () use ($data, $buyer) {
            $buyer->update($data);
        });
        return redirect()->route('buyer.index')->with('success', trans('Buyer Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buyer $buyer)
    {
        $partMasterCount = $buyer->part_master()->count();
        if ($partMasterCount > 0) {
            return redirect()->route('buyer.index')->with('error', trans('This Buyer Have Part Master Entry, First Delete the Part Master !'));
        }
        $buyer->delete();
        return redirect()->route('buyer.index')->withSuccess(trans('Your Buyer Has Been Deleted Successfully'));
    }

    private function validation(Request $request)
    {
        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'buyer_email' => ['required', 'email', 'max:255']
        ]);
    }
}
