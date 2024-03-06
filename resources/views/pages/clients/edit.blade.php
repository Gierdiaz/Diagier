@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-5" style="color: #50bcb3;">
                        <li class="breadcrumb-item"><a href="/" style="color: #50bcb3;">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('clients.index') }}" style="color: #50bcb3;">Clientss</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: #50bcb3;">Project</a></li>
                    </ol>
                </nav>
                <h2 class="mt-5 mb-5">{{$clients->name}} {{$clients->surname}}</h2>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Edit Clients</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('clients.update', $clients->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $clients->name }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Enter surname" value="{{ $clients->surname }}">
                            @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{ $clients->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Enter company" value="{{ $clients->company }}">
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Enter position" value="{{ $clients->position }}">
                            @error('position')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone" value="{{ $clients->phone }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="observation" class="form-label">Observation</label>
                            <textarea class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation" rows="3" placeholder="Enter observation">{{ $clients->observation }}</textarea>
                            @error('observation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Client</button>
                            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
