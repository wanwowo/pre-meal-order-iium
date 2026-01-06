<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Query builder examples
        $orderCount   = DB::table('orders')->count();
        $cafeCount    = DB::table('cafes')->count();
        $pendingCount = DB::table('orders')
            ->where('order_status', 'pending')
            ->count();

        // Pass variables to the view
        return view('dashboard-card', compact('orderCount', 'cafeCount', 'pendingCount'));
    }
}