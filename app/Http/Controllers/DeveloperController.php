<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperFormRequest;
use App\Models\Developer;
use Illuminate\View\View;

class DeveloperController extends Controller
{

    public function index(): View
    {
        $developers = Developer::orderBy('id', 'desc')->paginate(5);

        return view('pages.developers.index', compact('developers'));
    }

    public function show(Developer $developer): View
    {
        return view('pages.developers.show', compact('developer'));
    }

    public function create(): View
    {
        return view('pages.developers.create');
    }

    public function store(DeveloperFormRequest $request)
    {
        dd($request);
        Developer::create($request->validated());
        
        return redirect()->route('developers.index');
    }

    public function edit(Developer $developer): View
    {
        return view('pages.developers.edit', compact('developer'));
    }

    public function update(DeveloperFormRequest $request, Developer $developer)
    {
        $developer->update($request->validated());

        return redirect()->route('developers.index');
    }

    public function destroy(Developer $developer)
    {
        $developer->delete();

        return redirect()->route('developers.index');
    }
}
