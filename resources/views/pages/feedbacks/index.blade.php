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
        <h2 class="mt-5 mb-5" style="color: rgb(150, 95, 24);">Feedback - {{ $feedbacks->first()->name }} </h2>
        <div class="card">
            <div class="card-header" style="background-color: rgb(150, 95, 24);">
                <h4 class="mb-0 text-black">Feedback</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr>
                                <th scope="col" style="color: rgb(150, 95, 24);">Código</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Comment</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Reviewer</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Attachments</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Rating</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Feedback</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Task</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Actions</th>
                                {{-- @can('view', $feedbacks)
                                <th scope="col" style="color: rgb(150, 95, 24);">Actions</th>
                                @endcan --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->comment }}</td>
                                <td>{{ $feedback->reviewer }}</td>
                                <td>{{ $feedback->attachments }}</td>
                                <td>{{ $feedback->rating }}</td>
                                <td>{{ $feedback->feedback }}</td>
                                <td>{{ $feedback->task->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        @can('update', $feedback)
                                        <a href="{{ route('feedbacks.edit', $feedback->id) }}" class="btn btn-primary btn-sm square-btn"><i class="material-icons">edit</i></a>
                                        @endcan
                                        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('delete', $feedback)
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
                    {{ $feedbacks->links() }}
                </div>
                @can('create', $feedback)
                <div class="mt-3">
                    <a href="{{ route('feedbacks.create') }}" class="btn btn-secondary" style="background-color: rgb(150, 95, 24);">Create</a>
                </div>   
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
