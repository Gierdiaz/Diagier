@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">     
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('developers.index') }}">Desenvolvedor</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}">Projeto</a></li>
            </ol>
        </nav>
        <h2 class="mt-5 mb-5">Projetos do Desenvolvedor - {{ $projects->first()->developer->name }}</h2>
        <div class="card">
            <div class="card-header bg-blue">
                <h4 class="mb-0 text-black">Projetos</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Projeto</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Tecnologias</th>
                                <th scope="col">Início</th>
                                <th scope="col">Término</th>
                                <th scope="col">Status</th>
                                <th scope="col">Desenvolvedor</th>
                                <th scope="col">Ações</th>
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
                    <a href="{{ route('projects.create') }}" class="btn btn-secondary">Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
