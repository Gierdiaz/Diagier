<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('layout.layout');
    }
}
