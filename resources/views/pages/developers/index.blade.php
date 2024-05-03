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
            <h2 class="mt-5 mb-5">Desenvolvedor - {{ $developers->first()->name }} </h2>
            <div class="card">
                <div class="card-header" style="background-color: #50bcb3;">
                    <h4 class="mb-0 text-black">Desenvolvedores</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="developers-table">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Github</th>
                                            <th scope="col">Technologies</th>
                                            <th scope="col">Level</th>
                                            <th scope="col text-align: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($developers as $developer)
                                        <tr>
                                            <td>{{ $developer->id }}</td>
                                            <td>{{ $developer->name }}</td>
                                            <td>{{ $developer->email }}</td>
                                            <td>{{ $developer->github }}</td>
                                            <td>{{ $developer->technologies }}</td>
                                            <td>{{ $developer->level }}</td>
                                            <td style="text-align: center;">
                                                <div>
                                                    @can('update', $developer)
                                                    <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-outline-primary btn-sm rounded-circle mr-2"><i class="material-icons">edit</i></a>
                                                    @endcan
                                                    @can('delete', $developer)
                                                    <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle ml-2"><i class="material-icons">delete</i></button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div  class="d-flex justify-content-center">
                                {{ $developers->links() }}
                            </div>
                            @can('create', $developer)
                            <div class="mt-3">
                                <a href="{{ route('developers.create') }}" class="btn btn-secondary" style="background-color: #50bcb3;">Create</a>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
