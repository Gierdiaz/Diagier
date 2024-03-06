<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ClientFormRequest;
use Exception;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return View('pages.clients.index', compact('clients'));
    }

    public function show($id): View
    {
        try {
            $clients = Client::findOrFail($id);

            return view('pages.clients.show', compact('clients'));
        } catch (ModelNotFoundException $e) {
            return back()->withError('Client not found.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while showing the Client.');
        }
    }

    public function create(): View
    {
        return view('pages.clients.create');
    }

    public function store(ClientFormRequest $request): RedirectResponse
    {
        try {
            $this->authorize('create', Client::class);

            $validate            = $request->validated();
            $validate['user_id'] = Auth::id();

            Client::create($validate);

            return redirect()->route('clients.index')->with('success', 'Client created successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while storing Client.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while storing Client.');
        }
    }

    public function edit($id)
    {
        try {
            $clients = Client::findOrFail($id);

            $this->authorize('update', $clients);

            return view('pages.clients.edit', compact('clients'));
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Client not found.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while editing Client.');
        }
    }

    public function update(ClientFormRequest $request, $id): RedirectResponse
    {
        try {
            $client = Client::findOrFail($id);
    
            $this->authorize('update', $client);
    
            $client->update($request->validated());
    
            return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while updating Client.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while updating Client.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $clients = Client::findOrFail($id);

            $this->authorize('delete', $clients);

            $clients->delete();

            return back()->with('success', 'Client deleted successfully!');
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Client not found.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while deleting Client.');
        }
    }
}