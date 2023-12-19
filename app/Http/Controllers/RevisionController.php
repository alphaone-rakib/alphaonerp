<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        return view('revision.index', compact('data'));
    }

    private function filter(Request $request)
    {
        $query = Revision::latest();

        if ($request->revision_id)
            $query->where('revision_id', 'like', '%' . $request->revision_id . '%');

        if ($request->revision_name)
            $query->where('revision_name', 'like', '%' . $request->revision_name . '%');

        return $query;
    }

    public function getData(Request $request)
    {
        $json = new \stdClass();
        $id = request('id');
        if ($id) {
            $data = Revision::find($id);
            $revision['revision_description'] = isset($data['revision_description']) ? $data['revision_description'] : null;
            $revision['effective_date'] = isset($data['effective_date']) ? $data['effective_date'] : null;
            $revision['approved'] = isset($data['approved']) ? $data['approved'] : null;
            $json = (object) $revision;
        }
        return response()->json($json);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('revision.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'revision_id' => ['required', 'string'],
            'revision_name' => ['required', 'string'],
            'effective_date' => ['required', 'string'],
            'approved' => ['nullable', 'string'],
            'revision_description' => ['nullable', 'string']
        ]);

        $data = $request->only(['revision_id', 'revision_name', 'effective_date', 'approved', 'revision_description']);
        $data['user_id'] = auth()->user()->id;
        Revision::create($data);
        return redirect()->route('revision.index')->with('success', trans('Revision Added Successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Revision $revision)
    {
        return view('revision.show', compact('revision'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revision $revision)
    {
        return view('revision.edit', compact('revision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Revision $revision)
    {
        $request->validate([
            'revision_id' => ['required', 'string'],
            'revision_name' => ['required', 'string'],
            'effective_date' => ['required', 'string'],
            'approved' => ['nullable', 'string'],
            'revision_description' => ['nullable', 'string']
        ]);

        $data = $request->only(['revision_id', 'revision_name', 'effective_date', 'approved', 'revision_description']);
        $data['user_id'] = auth()->user()->id;
        $revision->update($data);
        return redirect()->route('revision.index')->with('success', trans('Revision Update Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revision $revision)
    {
        $revision->delete();
        return redirect()->route('bin.index')->with('success', trans('Group Deleted Successfully'));
    }
}
