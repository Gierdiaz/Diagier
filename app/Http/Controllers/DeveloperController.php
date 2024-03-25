<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperFormRequest;
use App\Models\Developer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\View\View;

class DeveloperController extends Controller
{
    public function index()
    {
        try {
            $developers = Developer::query()->orderBy('id', 'desc')->paginate(5);

            return view('pages.developers.index', compact('developers'));
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while loading developers.');
        }
    }

    public function show(Developer $developer)
    {
        try {
            $this->authorize('view', $developer);

            return view('pages.developers.show', compact('developer'));
        } catch (AuthorizationException $exception) {
            return back()->withError('Unauthorized.');
        }
    }

    public function create(): View
    {
        return view('pages.developers.create');
    }

    public function store(DeveloperFormRequest $request): RedirectResponse
    {
        try {
            $this->authorize('create', Developer::class);
            $validated = $request->validated();
            Developer::create($validated);

            return redirect()->route('developers.index')->with('success', 'Developer created successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while storing developer.');
        }
    }

    public function edit(Developer $developer)
    {
        try {
            $this->authorize('update', $developer);

            return view('pages.developers.edit', compact('developer'));
        } catch (AuthorizationException $exception) {
            return back()->withError('Unauthorized.');
        }
    }

    public function update(DeveloperFormRequest $request, Developer $developer): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $this->authorize('update', $developer);
            $developer->update($request->validated());
            DB::commit();

            return redirect()->route('developers.index')->with('success', 'Developer updated successfully!');
        } catch (QueryException $exception) {
            DB::rollBack();

            return back()->withError('An error occurred while updating developer.');
        }
    }

    public function destroy(Developer $developer)
    {
        DB::beginTransaction();

        try {
            $this->authorize('delete', $developer);
            $developer->delete();
            DB::commit();

            return redirect()->route('developers.index')->with('success', 'Developer deleted successfully');
        } catch (QueryException $exception) {
            DB::rollBack();

            return back()->withError('Failed to delete developer');
        }
    }
}
