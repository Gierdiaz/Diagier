<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Developer;
use App\Models\Project;
use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(5);

        return view('pages.tasks.index', compact('tasks'));
    }

    public function show()
    {
        //
    }
    
    public function create(): View
    {
        $developers = Developer::all();
        $projects = Project::all();

        return view('pages.tasks.create', compact('developers', 'projects'));
    }

    public function store(TaskFormRequest $request)
    {

        Task::create($request->validated());

        return redirect()->route('tasks.index');
    }

    public function edit($tasks)
    {
        $tasks = Task::findOrFail($tasks);
        $developers = Developer::all();
        $projects = Project::all();
        return view('pages.tasks.edit', compact('tasks', 'developers', 'projects'));
    }

    public function update(TaskFormRequest $request, $id)
    {
        Task::findOrFail($id)->update($request->validated());

        return redirect()->route('tasks.index');
    }

    public function destroy(Taks $tasks)
    {
        $this->authorize('delete', $tasks);

        $tasks->delete();

        return redirect()->route('tasks.index');
    }
}
