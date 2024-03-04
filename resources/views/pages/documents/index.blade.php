@extends('layout.layout')

@section('content')
    <div class="container">
        <h1>Documents</h1>
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('documents.index') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="type" class="mr-2">Type:</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">All</option>
                            <option value="Contract" {{ request('type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Specification" {{ request('type') == 'Specification' ? 'selected' : '' }}>Specification</option>
                            <option value="Report" {{ request('type') == 'Report' ? 'selected' : '' }}>Report</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="{{ route('documents.index') }}" class="btn btn-secondary ml-2">Clear Filters</a>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('documents.create') }}" class="btn btn-success">Create Document</a>
            </div>
            @foreach($documents as $document)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $document->name }}</h5>
                            <p class="card-text">{{ $document->description }}</p>
                            <p class="card-text">Type: {{ $document->type }}</p>
                            <p class="card-text">Visibility: {{ $document->visibility }}</p>
                            @if($document->file_url)
                                <a href="{{ route('documents.download', $document->file) }}" class="btn btn-primary" download>Download</a>
                            @else
                                <p class="card-text">No file available</p>
                            @endif
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-primary mt-2">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
