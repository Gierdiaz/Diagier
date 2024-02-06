<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Support\Facades\Gate;

class DeveloperController extends Controller
{
    public function index($profileId)
    {
        $developer = Developer::findOrFail($profileId);

        // if (Gate::denies('view-developer-details', $developer)) {
        //     return redirect()->route('profiles')->with('error', 'Você não tem permissão para visualizar os detalhes deste desenvolvedor.');
        // }

        return view('pages.developers.index', compact('developer'));
    }

    public function projects(Developer $developer)
    {
        $projects = $developer->projects;

        return view('pages.projects.index', compact('developer', 'projects'));
    }
}
