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
        // dd($categories);
        return view('business_roles.create', compact('categories'));
    }

    public function childMenuchecked(Request $request)
    {
        $tableId = $request->menuId;

        $child = $this->selectedTree($tableId);
        return response()->json($child);
    }

    // public function selectedTree($rootCategoryId)
    // {
    //     $allCategories = Menu::get();
    //     $rootCategories = $allCategories->where('parent_id', $rootCategoryId);

    //     self::selectedFormatTree($rootCategories, $allCategories);
    // }

    public function tree()
    {
        $allCategories = Menu::get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }

    // private static function selectedFormatTree($categories, $allCategories)
    // {
    //     foreach ($categories as $category) {
    //         $category->children = $allCategories->where('parent_id', $category->id)->values();

    //         if ($category->children->isNotEmpty()) {
    //             self::formatTree($category->children, $allCategories);
    //         }
    //     }
    // }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessRole $businessRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessRole $businessRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessRole $businessRole)
    {
        //
    }
}
