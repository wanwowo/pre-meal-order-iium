<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'item_availability' => 'boolean',
            'cafe_id' => 'required|exists:cafes,cafe_id',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu item created successfully.');
    }

    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_price' => 'required|numeric',
            'item_availability' => 'boolean',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu item deleted successfully.');
    }
}