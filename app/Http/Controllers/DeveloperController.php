<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperFormRequest;
use App\Models\Developer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DeveloperController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            view()->share('user', $user);

            return $next($request);
        });
    }

    public function index(): View
    {
        $developers = Developer::all();

        return view('pages.developers.index', compact('developers'));
    }

    public function create(): View
    {
        return view('pages.developers.create');
    }

    public function store(DeveloperFormRequest $request): RedirectResponse
    {

        Developer::create($request->all());

        return redirect()->route('developers.index')->with('success', 'Desenvolvedor criado com sucesso');
    }

    public function show(Developer $developer): View
    {
        return view('pages.developers.show', compact('developer'));
    }

    public function edit(Developer $developer): View
    {
        return view('pages.developers.edit', compact('developer'));
    }

    public function update(DeveloperFormRequest $request, Developer $developer): RedirectResponse
    {
        $developer->update($request->all());

        return redirect()->route('developers.index')->with('success', 'Desenvolvedor atualizado com sucesso');
    }

    public function destroy(Developer $developer): RedirectResponse
    {
        $developer->delete();

        return redirect()->route('developers.index')->with('success', 'Desenvolvedor excluído com sucesso');
    }
}
