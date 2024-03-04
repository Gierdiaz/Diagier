@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-5" style="color: #50bcb3;">
                    <li class="breadcrumb-item"><a href="/" style="color: #50bcb3;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('developers.index') }}" style="color: #50bcb3;">Developer</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: #50bcb3;">Project</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}" style="color: #50bcb3;">Task</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}" style="color: #50bcb3;">Feedback</a></li>
                </ol>
            </nav>
            <h2 class="mt-5 mb-5">Edit Document</h2>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Edit Document</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('documents.update', $documents->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $documents->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter description">{{ $documents->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                <option value="Contract" {{ $documents->type === 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="Specification" {{ $documents->type === 'Specification' ? 'selected' : '' }}>Specification</option>
                                <option value="Report" {{ $documents->type === 'Report' ? 'selected' : '' }}>Report</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="visibility" class="form-label">Visibility</label>
                            <input type="text" class="form-control @error('visibility') is-invalid @enderror" id="visibility" name="visibility" placeholder="Enter visibility" value="{{ $documents->visibility }}">
                            @error('visibility')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Document</button>
                            <a href="{{ route('documents.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
