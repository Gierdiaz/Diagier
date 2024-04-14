<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function returnDashboard(DashboardService $dashboardService){
        $data = [
            'labels' => ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
            'data'   => [25, 30, 15, 10, 20]
        ];

        $data_2 = $dashboardService->returnData();
        
        return view('dashboard.dashboard', compact('data','data_2'));
    }
}
