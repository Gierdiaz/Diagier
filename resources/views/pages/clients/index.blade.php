@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-md-12">     
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-5" style="color: #50bcb3;">
                <li class="breadcrumb-item"><a href="/" style="color: #50bcb3;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('developers.index') }}" style="color: #50bcb3;">Developer</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: #50bcb3;">Project</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}" style="color: #50bcb3;">client</a></li>
                <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}" style="color: #50bcb3;">Feedback</a></li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header bg-blue" style="background-color: #50bcb3;">
                <h4 class="mb-0 text-black">clients</h4>
            </div>
            <div class="card-body">
                <livewire:clients.index />
            </div>
        </div>
    </div>
</div>
@endsection
