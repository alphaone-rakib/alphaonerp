<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->filter($request)->paginate(10)->withQueryString();
        $menuItems = Menu::where('enabled', 1)->orderBy('name')->pluck('name', 'id');
        return view('menus.index', compact('data', 'menuItems'));
    }

    private function filter(Request $request)
    {
        $query = Menu::latest();

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
        $menuItems = Menu::where('enabled', 1)->orderBy('name')->get();
        $menuOrders = $this->menuOrder();
        $menusHref = $this->menusHref();

        $reserveMenuOrder = Menu::orderBy('menu_order')->pluck('menu_order')->toArray();

        $freeMenuOrder = array_diff($menuOrders, $reserveMenuOrder);
        return view('menus.create', compact('menuItems', 'menusHref', 'menuOrders', 'freeMenuOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'parent_id' => ['nullable', 'string'],
            'menu_href' => ['nullable', 'string'],
            'menu_order' => ['nullable', 'string'],
            'enabled' => ['nullable', 'in:0,1'],
        ]);

        if ($request->parent_id == "") {
            $request->validate([
                'parent_menu_icon' => ['required', 'string'],
            ]);
        } else {
            $request->validate([
                'parent_menu_icon' => ['nullable', 'string'],
            ]);
        }

        $data = $request->only(['name', 'parent_id', 'menu_href', 'menu_order', 'parent_menu_icon', 'enabled']);
        Menu::create($data);
        return redirect()->route('menu.index')->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menuItems = Menu::where('enabled', 1)->orderBy('name')->pluck('name', 'id');
        $menuOrders = $this->menuOrder();
        $menusHref = $this->menusHref();

        $reserveMenuOrder = Menu::orderBy('menu_order')->whereNotIn('menu_order', [$menu->menu_order])->pluck('menu_order')->toArray();

        $freeMenuOrder = array_diff($menuOrders, $reserveMenuOrder);

        return view('menus.edit', compact('menuItems', 'menu', 'menusHref', 'menuOrders', 'freeMenuOrder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'parent_id' => ['nullable', 'string'],
            'menu_href' => ['nullable', 'string'],
            'menu_order' => ['nullable', 'string'],
            'enabled' => ['nullable', 'in:0,1'],
        ]);

        if ($request->parent_id == "") {
            $request->validate([
                'parent_menu_icon' => ['required', 'string'],
            ]);
        } else {
            $request->validate([
                'parent_menu_icon' => ['nullable', 'string'],
            ]);
        }

        $data = $request->only(['name', 'parent_id', 'menu_href', 'menu_order', 'parent_menu_icon', 'enabled']);
        $menu->update($data);
        return redirect()->route('menu.index')->with('success', trans('Menu Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $subMenu = Menu::where('parent_id', $menu->id)->get();
        foreach ($subMenu as $sMenu) {
            $sMenu->delete();
        }
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }
}
