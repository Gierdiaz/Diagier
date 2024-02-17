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
        <h2 class="mt-5 mb-5" style="color: rgb(150, 95, 24);">Projetos do Desenvolvedor - {{ $projects->first()->developer->name }}</h2>
        <div class="card">
            <div class="card-header" style="background-color: rgb(150, 95, 24);">
                <h4 class="mb-0 text-black">Projetos</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr>
                                <th scope="col" style="color: rgb(150, 95, 24);">Código</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Projeto</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Descrição</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Tecnologias</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Início</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Término</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Status</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Desenvolvedor</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Ações</th>
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
                                <td>{{ $project->developer->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary btn-sm square-btn"><i class="material-icons">edit</i></a>
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
                <div class="mt-3">
                    <a href="{{ route('projects.create') }}" class="btn btn-secondary" style="background-color: rgb(150, 95, 24);">Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
