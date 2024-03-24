<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderStatisticsController extends Controller
{
    public function getMonthlyData()
    {
        $monthlyData = Statistics::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_orders')
        )
            ->groupBy('month')
            ->get();

        return response()->json($monthlyData);
    }
}
