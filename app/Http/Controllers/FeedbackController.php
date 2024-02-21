<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackFormRequest;
use App\Models\Feedback;
use App\Models\Task;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function index(): View
    {
        $feedbacks = Feedback::orderBy('id', 'desc')->paginate(5);

        return view('pages.feedbacks.index', compact('feedbacks'));
    }

    public function show()
    {
        //
    }

    public function create(): View
    {
        $tasks = Task::all();

        return view('pages.feedbacks.create', compact('tasks'));
    }

    public function store(FeedbackFormRequest $request)
    {
        Feedback::create($request->validated());

        return redirect()->route('feedbacks.index');
    }

    public function edit($feedbacks)
    {
        $feedbacks = Feedback::findOrFail($feedbacks);
        $tasks = Task::all();

        return view('pages.feedbacks.edit', compact('feedbacks', 'tasks'));
    }

    public function update(FeedbackFormRequest $request, $id)
    {
        Feedback::findOrFail($id)->update($request->validated());

        return redirect()->route('feedbacks.index');
    }

    public function destroy(Feedback $feedbacks)
    {
        $this->authorize('delete', $feedbacks);

        $feedbacks->delete();

        return redirect()->route('feedbacks.index');
    }
}
