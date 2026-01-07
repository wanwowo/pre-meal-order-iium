<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Show menu items for a cafe
    public function index(Cafe $cafe)
    {
        $menus = $cafe->menus; // get menu via relationship

        return view('menus.index', compact('cafe', 'menus'));
    }
}

