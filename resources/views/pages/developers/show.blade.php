@extends('layout.layout')
@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $developer->name }}" disabled="true">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{ $developer->email }}" disabled="true">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="github" class="form-label">GitHub</label>
                            <input type="text" class="form-control @error('github') is-invalid @enderror" id="github" name="github" placeholder="Enter GitHub username" value="{{ $developer->github }}" disabled="true">
                            @error('github')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3" placeholder="Enter bio" disabled="true">{{ $developer->bio }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="technologies" class="form-label">Technologies</label>
                            <input type="text" class="form-control @error('technologies') is-invalid @enderror" id="technologies" name="technologies" placeholder="Enter technologies" value="{{ $developer->technologies }}" disabled="true">
                            @error('technologies')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="college" class="form-label">College</label>
                            <input type="text" class="form-control @error('college') is-invalid @enderror" id="college" name="college" placeholder="Enter college" value="{{ $developer->college }}" disabled="true">
                            @error('college')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input disabled="true" type="text" class="form-control @error('course') is-invalid @enderror" id="course" name="course" placeholder="Enter course" value="{{ $developer->course }}" disbaled="true">
                            @error('course')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="certifications" class="form-label">Certifications</label>
                            <input disabled="true" type="text" class="form-control @error('certifications') is-invalid @enderror" id="certifications" name="certifications" placeholder="Enter certifications" value="{{ $developer->certifications }}">
                            @error('certifications')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input disabled="true" type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Enter company" value="{{ $developer->company }}">
                            @error('company')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select disabled="true" class="form-select @error('level') is-invalid @enderror" id="level" name="level">
                                @foreach(['intern', 'junior', 'intermediate', 'senior', 'lead', 'manager', 'director', 'vp', 'executive', 'admin', 'specialist', 'consultant'] as $level)
                                    <option value="{{ $level }}" {{ $developer->level == $level ? 'selected' : '' }}>{{ ucfirst($level) }}</option>
                                @endforeach
                            </select>
                            @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input disabled="true" type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Enter city" value="{{ $developer->city }}">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input disabled="true" type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" placeholder="Enter state" value="{{ $developer->state }}">
                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input disabled="true" type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" placeholder="Enter country" value="{{ $developer->country }}">
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="work_mode" class="form-label">Work Mode</label>
                            <select disabled="true" class="form-select @error('work_mode') is-invalid @enderror" id="work_mode" name="work_mode">
                                @foreach(['home_office', 'presential', 'hybrid'] as $mode)
                                    <option value="{{ $mode }}" {{ $developer->work_mode == $mode ? 'selected' : '' }}>{{ str_replace('_', ' ', ucfirst($mode)) }}</option>
                                @endforeach
                            </select>
                            @error('work_mode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('developers.index') }}" class="btn btn-secondary">Back</a>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
