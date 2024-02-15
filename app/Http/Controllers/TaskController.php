<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('pages.tasks.index', compact('tasks'));
    }
}
