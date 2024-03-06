<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperFormRequest;
use App\Models\Developer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DeveloperController extends Controller
{
    public function index(): View
    {
        try {
            $developers = Developer::orderBy('id', 'desc')->paginate(5);

            return view('pages.developers.index', compact('developers'));
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while loading developers.');
        }
    }

    public function show($id): View
    {
        try {
            $developer = Developer::findOrFail($id);

            return view('pages.developers.show', compact('developer'));
        } catch (ModelNotFoundException $e) {
            return back()->withError('Developer not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while showing the developer.');
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

            $validate            = $request->validated();
            $validate['user_id'] = Auth::id();

            Developer::create($validate);

            return redirect()->route('developers.index')->with('success', 'Developer created successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while storing developer.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while storing developer.');
        }
    }

    public function edit($id)
    {
        try {
            $developer = Developer::findOrFail($id);

            $this->authorize('update', $developer);

            return view('pages.developers.edit', compact('developer'));
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Developer not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while editing developer.');
        }
    }

    public function update(DeveloperFormRequest $request, $id): RedirectResponse
    {
        try {
            $developer = Developer::findOrFail($id);

            $this->authorize('update', $developer);

            $developer->update($request->validated());

            return redirect()->route('developers.index')->with('success', 'Developer updated successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while updating developer.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while updating developer.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $developer = Developer::findOrFail($id);

            $this->authorize('delete', $developer);

            $developer->delete();

            return back()->with('success', 'Developer deleted successfully!');
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Developer not found.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred while deleting developer.');
        }
    }

}
