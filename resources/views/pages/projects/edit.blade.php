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
                    <livewire:projects.edit />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
