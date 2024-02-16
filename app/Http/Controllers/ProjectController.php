<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\Developer;
use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('id', 'desc')->paginate(5);

        return view('pages.projects.index', compact('projects'));
    }

    public function show()
    {
        
    }

    public function create(): View
    {
        $developers = Developer::all();

        return view('pages.projects.create', compact('developers'));
    }

    public function store(ProjectFormRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index');
    }

    public function edit($project)
    {
        $project = Project::findOrFail($project);
        $developers = Developer::all();
        return view('pages.projects.edit', compact('project', 'developers'));
    }

    public function update(ProjectFormRequest $request, $id)
    {
        Project::findOrFail($id)->update($request->validated());

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index');
    }
}
