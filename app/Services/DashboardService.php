<?php

namespace App\Services;
use App\Models\Dashboard;

class DashboardService
{
    public function returnData()
    {
        return Dashboard::returnData();
    }

}
