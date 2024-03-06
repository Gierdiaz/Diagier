@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-5" style="color: #50bcb3;">
                    <li class="breadcrumb-item"><a href="/" style="color: #50bcb3;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}" style="color: #50bcb3;">Clients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Client</li>
                </ol>
            </nav>
            <h2 class="mt-5 mb-5">Create Client</h2>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Create Client</h4>
                </div>
                <div class="card-body">
                    <livewire:clients.create />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
