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
            <h2 class="mt-5 mb-5">Create Developer</h2>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Create Developer</h4>
                </div>
                <div class="card-body">
                    <div>
                        <h2>Create Developer</h2>
                        <form action="{{ route('developers.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" wire:model.defer="name" placeholder="Enter name">
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model.defer="email" placeholder="Enter email">
                                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="github" class="form-label">GitHub</label>
                                <input type="text"  name="github" class="form-control @error('github') is-invalid @enderror" id="github" wire:model.defer="github" placeholder="Enter GitHub username">
                                @error('github') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea  name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" wire:model.defer="bio" rows="3" placeholder="Enter bio"></textarea>
                                @error('bio') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="technologies" class="form-label">Technologies</label>
                                <input type="text" name="technologies" class="form-control @error('technologies') is-invalid @enderror" id="technologies" wire:model.defer="technologies" placeholder="Enter technologies">
                                @error('technologies') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="college" class="form-label">College</label>
                                <input type="text" name="college" class="form-control @error('college') is-invalid @enderror" id="college" wire:model.defer="college" placeholder="Enter college">
                                @error('college') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="course" class="form-label">Course</label>
                                <input type="text" name="course" class="form-control @error('course') is-invalid @enderror" id="course" wire:model.defer="course" placeholder="Enter course">
                                @error('course') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="certifications" class="form-label">Certifications</label>
                                <input type="text" name="certifications" class="form-control @error('certifications') is-invalid @enderror" id="certifications" wire:model.defer="certifications" placeholder="Enter certifications">
                                @error('certifications') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="company" wire:model.defer="company" placeholder="Enter company">
                                @error('company') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="level" name="level" class="form-label">Level</label>
                                <select name="level" class="form-select @error('level') is-invalid @enderror" id="level" wire:model.defer="level">
                                    <option value="intern">Intern</option>
                                    <option value="junior">Junior</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="senior">Senior</option>
                                    <option value="lead">Lead</option>
                                    <option value="manager">Manager</option>
                                    <option value="director">Director</option>
                                    <option value="vp">VP</option>
                                    <option value="executive">Executive</option>
                                    <option value="admin">Admin</option>
                                    <option value="specialist">Specialist</option>
                                    <option value="consultant">Consultant</option>
                                </select>
                                @error('level') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" wire:model.defer="city" placeholder="Enter city">
                                @error('city') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" id="state" wire:model.defer="state" placeholder="Enter state">
                                @error('state') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="country" wire:model.defer="country" placeholder="Enter country">
                                @error('country') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="work_mode" class="form-label">Work Mode</label>
                                <select class="form-select" name="work_mode" @error('work_mode') is-invalid @enderror" id="work_mode" wire:model.defer="work_mode">
                                    <option value="home_office" title="Work from home full-time">Home Office</option>
                                    <option value="presential" title="Work from office full-time">Presential</option>
                                    <option value="hybrid" title="Combination of working from home and office">Hybrid</option>
                                </select>
                                @error('work_mode') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
