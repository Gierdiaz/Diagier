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
        <h2 class="mt-5 mb-5" style="color: rgb(150, 95, 24);">Tarefas do Desenvolvedor - {{ $tasks->first()->developer->name }}</h2>
        <div class="card">
            <div class="card-header bg-blue" style="background-color: rgb(150, 95, 24);">
                <h4 class="mb-0 text-black">Tasks</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr>
                                <th scope="col" style="color: rgb(150, 95, 24);">Código</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Name</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Description</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Comments</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Sprint</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Priority</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Status</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Developer</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Project</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->comments }}</td>
                                <td>{{ $task->sprint->format('d/m/Y') }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->developer->name }}</td>
                                <td>{{ $task->project->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm square-btn"><i class="material-icons">edit</i></a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('delete', $task)
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
                    {{ $tasks->links() }}
                </div>
                <div class="mt-3">
                    <a href="{{ route('tasks.create') }}" class="btn btn-secondary" style="background-color: rgb(150, 95, 24);">Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
