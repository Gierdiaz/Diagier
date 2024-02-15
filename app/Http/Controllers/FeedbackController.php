<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();

        return view('pages.feedbacks.index', compact('feedbacks'));
    }
}
