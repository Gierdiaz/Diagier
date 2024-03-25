<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\{Developer, Project, Task};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $tasks = Task::with(['developer', 'project'])->orderBy('id', 'desc')->paginate(5);
            return view('pages.tasks.index', compact('tasks'));
        } catch (\Exception $e) {
            Log::error($e);
            return back()->withError('An error occurred while loading tasks.');
        }
    }

    public function show($taskId)
    {
        try {
            $task = Task::with(['developer', 'project'])->findOrFail($taskId);
            return view('pages.tasks.show', compact('task'));
        } catch (\Exception $e) {
            Log::error($e);
            return back()->withError('An error occurred while loading the task.');
        }
    }    

    public function create()
    {
        try {
            $developers = Developer::all();
            $projects = Project::all();
            return view('pages.tasks.create', compact('developers', 'projects'));
        } catch (\Exception $e) {
            Log::error($e);
            return back()->withError('An error occurred while loading the create page.');
        }
    }
    

    public function store(TaskFormRequest $request)
    {
        DB::beginTransaction();
        try {
            Task::create($request->validated());
            DB::commit();
            return redirect()->route('tasks.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return back()->withError('An error occurred while storing the task.');
        }
    }

    public function edit($taskId)
    {
        try {
            $task = Task::findOrFail($taskId);
            $developers = Developer::all();
            $projects = Project::all();
            return view('pages.tasks.edit', compact('task', 'developers', 'projects'));
        } catch (\Exception $e) {
            Log::error($e);
            return back()->withError('An error occurred while loading the edit page.');
        }
    }

    public function update(TaskFormRequest $request, $taskId)
    {
        DB::beginTransaction();
        try {
            $task = Task::findOrFail($taskId);
            $task->update($request->validated());
            DB::commit();
            return redirect()->route('tasks.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return back()->withError('An error occurred while updating the task.');
        }
    }


    public function destroy($taskId)
    {
        DB::beginTransaction();
        try {
            $task = Task::findOrFail($taskId);
            $task->delete();
            DB::commit();
            return redirect()->route('tasks.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return back()->withError('An error occurred while deleting the task.');
        }
    }
}
