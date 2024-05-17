<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\{Client, Developer, Project};
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\View\View;
use App\Models\DeveloperProject;

class ProjectController extends Controller
{
    public function index(): View
    {
        try {
            $projects = Project::select('projects.*')
            ->orderBy('id', 'desc')
            ->paginate(5);

            return view('pages.projects.index', compact('projects'));
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while loading projects.');
        }
    }

    public function show(Project $project): View
    {
        try {
            return view('pages.projects.show', compact('project'));
        } catch (\Exception $e) {
            return back()->withError('An error occurred while showing the project.');
        }
    }

    public function create(): View
    {
        try {
            $developers = Developer::all();
            $clients    = Client::all();

            return view('pages.projects.create', compact('developers', 'clients'));
        } catch (\Exception $e) {
            return back()->withError('An error occurred while loading developers.');
        }
    }

    public function store(ProjectFormRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $validated = $request->validated();
            $data = ['name' => $validated['name'],
                     'description' => $validated['description'],
                     'client' => $validated['client'],
                     'technologies' => $validated['technologies'],
                     'start_date' => $validated['start_date'],
                     'end_date' => $validated['end_date'],
                     'budget' => $validated['budget'],
                     'status' => $validated['status']];

            $project = new Project();
            $project->fill($data);
            $project->save();

            for($i = 0; $i < count($validated["developer_id"]); $i++){
                $developer_project = new DeveloperProject();
                $developer_project->project_id   = $project['id'];
                $developer_project->developer_id = $validated["developer_id"][$i];
                $developer_project->save();
            }
            DB::commit();

            return redirect()->route('projects.index')->with('success', 'Project created successfully!');
        } catch (QueryException $exception) {
            DB::rollBack();
            return back()->withError('An error occurred while storing project.');
        }
    }

    public function edit(Project $project)
    {
        try {
            $developers = Developer::all();
            $projectDevelopers = DeveloperProject::listProjectDevelopers($project->id)->pluck('developer_id')->toArray();

            return view('pages.projects.edit', compact('project','projectDevelopers', 'developers'));
        } catch (\Exception $e) {
            dd($e);
            return back()->withError('An error occurred while editing project.');
        }
    }

    public function update(ProjectFormRequest $request, Project $project): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $project->where('id', $project->id)->delete();

            $validated = $request->validated();
            $data = ['name'         => $validated['name'],
                     'description'  => $validated['description'],
                     'client'       => $validated['client'],
                     'technologies' => $validated['technologies'],
                     'start_date'   => $validated['start_date'],
                     'end_date'     => $validated['end_date'],
                     'budget'       => $validated['budget'],
                     'status'       => $validated['status']];

            $project = new Project();
            $project->fill($data);
            $project->save();

            DeveloperProject::delete_developers($project->id);

            for($i = 0; $i < count($validated["developer_id"]); $i++){
                $developer_project               = new DeveloperProject();
                $developer_project->project_id   = $project['id'];
                $developer_project->developer_id = $validated["developer_id"][$i];
                $developer_project->save();
            }

            DB::commit();

            return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
        } catch (QueryException $exception) {
            DB::rollBack();

            return back()->withError('An error occurred while updating project.');
        }
    }

    public function destroy(Project $project): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $project->delete();
            DB::commit();

            return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
        } catch (QueryException $exception) {
            DB::rollBack();

            return back()->withError('An error occurred while deleting project.');
        }
    }
}
