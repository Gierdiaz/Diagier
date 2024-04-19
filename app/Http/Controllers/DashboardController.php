<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function returnDashboard(DashboardService $dashboardService){
        $data_2 = $dashboardService->returnData();

        return view('dashboard.dashboard', compact('data','data_2'));
    }
}
