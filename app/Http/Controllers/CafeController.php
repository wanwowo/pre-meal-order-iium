<?php

namespace App\Http\Controllers;

use App\Models\Cafe;

class CafeController extends Controller
{
    // Show all cafes
    public function index()
    {
        $cafes = Cafe::all();
        return view('cafes.index', compact('cafes'));
    }

    // Show one cafe and its menu
    public function show($id)
    {
        $cafe = Cafe::with('menus')->findOrFail($id);
        return view('cafes.show', compact('cafe'));
    }
}

