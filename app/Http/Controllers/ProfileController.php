<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();

        return view('pages.profiles.index', compact('profiles'));
    }
}
