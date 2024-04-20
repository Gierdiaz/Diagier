<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\{Client, Developer, Project};
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        try {
            $projects = Project::join('developers','projects.developer_id','=','developers.id')
            ->join('clients','projects.client_id','=','clients.id')
            ->select('projects.*','clients.name as client')
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
            Project::create($validated);
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

            return view('pages.projects.edit', compact('project', 'developers'));
        } catch (\Exception $e) {
            return back()->withError('An error occurred while editing project.');
        }
    }

    public function update(ProjectFormRequest $request, Project $project): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $project->update($request->validated());
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
