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
        $tasks = Task::with(['developer', 'project'])->orderBy('id', 'desc')->paginate(5);

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

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        $developers = Developer::all();
        
        $projects = Project::all();

        return view('pages.tasks.edit', compact('task', 'developers', 'projects'));
    }

    public function update(TaskFormRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index');
    }
}
