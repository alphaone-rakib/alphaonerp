<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\BusinessRole;
use Illuminate\Http\Request;

class BusinessRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        $menus = Menu::where('enabled', 1)->orderBy('name')->pluck('name', 'id');
        return view('business_roles.index', compact('data', 'menus'));
    }

    private function filter(Request $request)
    {
        $query = BusinessRole::latest();

        if ($request->role_id)
            $query->where('role_id', 'like', '%' . $request->role_id . '%');

        if ($request->name)
            $query->where('name', 'like', '%' . $request->name . '%');

        if ($request->enabled > -1)
            $query->where('enabled', $request->enabled);

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->tree();
        return view('business_roles.create', compact('categories'));
    }

    public function childMenuchecked(Request $request)
    {
        $tableId = $request->menuId;

        $child = $this->selectedTree($tableId);
        return response()->json($child);
    }

    public function tree()
    {
        $allCategories = Menu::get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    private static function formatTree($categories, $allCategories)
    {
        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id', $category->id)->values();

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'menus' => ['required', 'array'],
        ]);

        $businessRole = BusinessRole::create([
            'user_id' => auth()->user()->id,
            'role_id' => $request->input('role_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'enabled' => 1
        ]);

        $businessRole->menus()->attach($request->input('menus'));

        session()->flash('success', trans('Business Role Created Successfully'));
        return redirect()->route('business-role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessRole $businessRole)
    {
        $menus = array();
        foreach ($businessRole->menus as $menu) {
            $menus[] = $menu->id;
        }

        $categories = $this->tree();

        return view('business_roles.show', compact('categories', 'businessRole', 'menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessRole $businessRole)
    {
        $menus = array();
        foreach ($businessRole->menus as $menu) {
            $menus[] = $menu->id;
        }

        $categories = $this->tree();
        return view('business_roles.edit', compact('categories', 'businessRole', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessRole $businessRole)
    {
        $request->validate([
            'role_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'menus' => ['required', 'array'],
            'enabled' => ['nullable', 'in:0,1']
        ]);

        $data = $request->only(['role_id', 'name', 'description', 'enabled']);
        $businessRole->update($data);
        $businessRole->menus()->sync($request->input('menus'));

        session()->flash('success', trans('Business Role Edit Successfully'));
        return redirect()->route('business-role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessRole $businessRole)
    {
        $businessRole->menus()->detach();
        $businessRole->delete();
        return redirect()->route('business-role.index')->with('success', trans('Plant Deleted Successfully'));
    }
}
