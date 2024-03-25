<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentFormRequest;
use App\Models\Document;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\{Auth, Storage};
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(Request $request): View
    {
        try {
            $documents = Document::query();

            $documents->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->type);
            });

            $documents = $documents->get();

            // Transform each document to add the file's public URL
            $documents->transform(function ($document) {
                if ($document->file) {
                    // Get the public URL of the file using the disk configured in the filesystems.php
                    $document->file_url = Storage::disk('documents')->url($document->file);
                } else {

                    $document->file_url = null;
                }

                return $document;
            });

            return view('pages.documents.index', compact('documents'));
        } catch (\Throwable $exception) {

            return back()->withErrors('An error occurred while loading documents');
        }
    }

    public function download($fileName)
    {
        $filePath = 'documents/' . $fileName;

        return Storage::download($filePath, null, ['Content-Type' => 'text/plain']);
    }

    public function create(): View
    {
        return view('pages.documents.create');
    }

    public function store(DocumentFormRequest $request)
    {
        try {
            $validate = $request->validated();

            $validate['uploaded_by'] = Auth::id();

            Document::create($validate);

            return redirect()->route('documents.index')->with('success', 'Document created successfully!');
        } catch (QueryException $exception) {
            return back()->withErrors('An error occurred while storing document.');
        }
    }

    public function edit($id): View
    {
        try {
            $documents = Document::findOrFail($id);

            return view('pages.documents.edit', compact('documents'));
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Document not found.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while editing document.');
        }
    }

    public function update(DocumentFormRequest $request, $id): RedirectResponse
    {
        try {
            $documents = Document::findOrFail($id);

            $documents->update($request->validated());

            return redirect()->route('documents.index')->with('success', 'Document updated successfully!');
        } catch (QueryException $exception) {
            return back()->withError('An error occurred while updating document.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while updating document.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $documents = Document::findOrFail($id);

            $documents->delete();

            return redirect()->route('document.index')->with('success', 'Document deleted successfully!');
        } catch (ModelNotFoundException $exception) {
            return back()->withError('Document not found.');
        } catch (Exception $e) {
            return back()->withError('An error occurred while deleting document.');
        }
    }
}
