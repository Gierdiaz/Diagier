<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFormRequest;
use App\Models\{Developer, Project};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\{Auth, Gate};
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        try {
            $projects = Project::with('developer')->orderBy('id', 'desc')->paginate(5);

            return view('pages.projects.index', compact('projects'));
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while loading projects.');
        }
    }

    public function show($id): View
    {
        try {
            $project = Project::with('developer')->findOrFail($id);

            return view('pages.projects.show', compact('project'));
        } catch (ModelNotFoundException $e) {
            return back()->withError('Project not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while showing the project.');
        }
    }

    public function create(): View
    {
        if (Gate::denies('create', Project::class)) {
            abort(403, 'Unauthorized action.');
        }

        $developers = Developer::all();

        return view('pages.projects.create', compact('developers'));
    }

    public function store(ProjectFormRequest $request): RedirectResponse
    {
        try {
            $validate            = $request->validated();
            $validate['user_id'] = Auth::id();

            Project::create($validate);

            return redirect()->route('projects.index')->with('success', 'Project created successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while storing project.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while storing project.');
        }
    }

    public function edit($id): RedirectResponse
    {
        try {
            $project = Project::findOrFail($id);

            if (Gate::denies('update', $project)) {
                abort(403, 'Unauthorized action.');
            }

            $developers = Developer::all();

            return view('pages.projects.edit', compact('project', 'developers'));
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Project not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while editing project.');
        }
    }

    public function update(ProjectFormRequest $request, $id): RedirectResponse
    {
        try {
            $project = Project::findOrFail($id);

            $project->update($request->validated());

            return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while updating project.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while updating project.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {

            $project = Project::findOrFail($id);

            if (Gate::denies('delete', $project)) {
                abort(403, 'Unauthorized action.');
            }

            $project->delete();

            return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Project not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while deleting project.');
        }
    }
}
