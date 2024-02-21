@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-md-12">     
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-5" style="color: rgb(150, 95, 24);">
                <li class="breadcrumb-item"><a href="/" style="color: rgb(150, 95, 24);">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('developers.index') }}" style="color: rgb(150, 95, 24);">Developer</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: rgb(150, 95, 24);">Project</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}" style="color: rgb(150, 95, 24);">Task</a></li>
                <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}" style="color: rgb(150, 95, 24);">Feedback</a></li>
            </ol>
        </nav>
        @if ($projects->isNotEmpty())
        <h2 class="mt-5 mb-5" style="color: rgb(150, 95, 24);">Developer's Projects - {{ $projects->first()->developer ? $projects->first()->developer->name : 'No projects assigned' }} </h2>
        @else
            <h2 class="mt-5 mb-5" style="color: rgb(150, 95, 24);">Developer's Projects - No projects assigned</h2>
        @endif
        <div class="card">
            <div class="card-header" style="background-color: rgb(150, 95, 24);">
                <h4 class="mb-0 text-black">Projects</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr>
                                <th scope="col" style="color: rgb(150, 95, 24);">ID</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Name</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Description</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Technologies</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Start Date</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">End Date</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Status</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Developer</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->technologies }}</td>
                                <td>{{ $project->start_date->format('d/m/Y') }}</td>
                                <td>{{ $project->end_date->format('d/m/Y') }}</td>
                                <td>{{ ucfirst($project->status) }}</td>
                                <td>{{ $project->developer ? $project->developer->name : 'No developer assigned' }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('update', $project)
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm square-btn"><i class="material-icons">edit</i></a>
                                        @endcan
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('delete', $project)
                                            <button type="submit" class="btn btn-danger btn-sm square-btn"><i class="material-icons">delete</i></button>
                                            @endcan   
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $projects->links() }}
                </div>
                @can('create', $project)
                <div class="mt-3">
                    <a href="{{ route('projects.create') }}" class="btn btn-secondary" style="background-color: rgb(150, 95, 24);">Create</a>
                </div>
                @endcan 
            </div>
        </div>
    </div>
</div>
@endsection
