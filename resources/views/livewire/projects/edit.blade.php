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
            <h2 class="mt-5 mb-5">Edit Project</h2>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Edit Project</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name</label>
                            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter project name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Project Description</label>
                            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter project description"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Client</label>
                            <input wire:model="client" type="text" class="form-control @error('client') is-invalid @enderror" id="client" name="client" placeholder="Enter client name">
                            @error('client')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="technologies" class="form-label">Technologies</label>
                            <input wire:model="technologies" type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" placeholder="Enter technologies used">
                            @error('technologies')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input wire:model="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date">
                            @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input wire:model="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date">
                            @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="budget" class="form-label">Budget</label>
                            <input wire:model="budget" type="number" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" placeholder="Enter project budget">
                            @error('budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select wire:model="status" class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="suspended">Suspended</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="developer_id" class="form-label">Developer</label>
                            <select wire:model="developer_id" class="form-select @error('developer_id') is-invalid @enderror" id="developer_id" name="developer_id">
                                <option selected disabled>Choose a developer</option>
                                @foreach($developers as $developer)
                                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                @endforeach
                            </select>
                            @error('developer_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Project</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
