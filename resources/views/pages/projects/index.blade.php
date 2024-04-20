@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="/" style="color: #50bcb3;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('developers.index') }}" style="color: #50bcb3;">Developer</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: #50bcb3;">Project</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}" style="color: #50bcb3;">Task</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}" style="color: #50bcb3;">Feedback</a></li>
                </ol>
            </nav>
            <h2 class="mt-5 mb-5">Projects</h2>
            <div class="card">
                <div class="card-header" style="background-color: #50bcb3;">
                    <h4 class="mb-0 text-black">Projects</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="projects-table">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Technologies</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Budget</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->client }}</td>
                                            <td>{{ $project->technologies }}</td>
                                            <td>{{ $project->start_date }}</td>
                                            <td>{{ $project->end_date }}</td>
                                            <td>{{ $project->budget }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td style="text-align: center;">
                                                <div>
                                                    <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-outline-primary btn-sm rounded-circle mr-2"><i class="material-icons">edit</i></a>
                                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle ml-2"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div  class="d-flex justify-content-center">
                                {{ $projects->links() }}
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('projects.create') }}" class="btn btn-secondary" style="background-color: #50bcb3;">Create Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
