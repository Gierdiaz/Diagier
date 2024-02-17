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

    public function edit($projects)
    {
        $projects = Project::findOrFail($projects);
        $developers = Developer::all();
        return view('pages.projects.edit', compact('projects', 'developers'));
    }

    public function update(ProjectFormRequest $request, $id)
    {
        Project::findOrFail($id)->update($request->validated());

        return redirect()->route('projects.index');
    }

    public function destroy(Project $projects)
    {
        $this->authorize('delete', $projects);

        $projects->delete();

        return redirect()->route('projects.index');
    }
}
