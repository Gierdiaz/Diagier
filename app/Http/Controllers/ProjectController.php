<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
       $projects = Project::all();
     
        return view('pages.projects.index', compact('projects'));
    }

    public function tasks(Project $projects)
    {
        $tasks = $projects->tasks;

        return view('projects.tasks');
    }
}
