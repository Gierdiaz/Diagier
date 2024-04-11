@extends('layout.core.layout')

@section('content')
<section>
    <nav>
        <ul class="text-main-400 flex gap-4">
            <li><a href="/" class="text-main-400">Home</a></li>
            <li><a href="{{ route('developers.index') }}" class="text-main-400">Developer</a></li>
            <li><a href="{{ route('projects.index') }}" class="text-main-400">Project</a></li>
            <li><a href="{{ route('tasks.index') }}" class="text-main-400">Task</a></li>
            <li><a href="{{ route('feedbacks.index') }}" class="text-main-400">Feedback</a></li>
        </ul>
    </nav>

    <div>
        <h3 class="bg-main-400">Tasks</h3>

        <table class="block max-w-full overflow-x-scroll">
            <thead>
                <tr class="w-full">
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">ID</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Name</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Description</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Comments</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Sprint</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Priority</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Status</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Developer</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Project</th>
                    <th class="min-w-[250px] text-main-400 text-left" scope="col">Actions</th>
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
                    <td>{{ $task->developer ? $task->developer->name : 'N/A' }}</td>
                    <td>{{ $task->project ? $task->project->name : 'N/A' }}</td>
                    <td>
                        <div>
                            @can('update', $task)
                            <a href="{{ route('tasks.edit', $task->id) }}">edit</a>
                            @endcan
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                @can('delete', $task)
                                <button type="submit">delete</button>
                                @endcan
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>{{ $tasks->links() }}</div>

        @can('create', App\Models\Task::class)
        <div class="mt-3">
            <a href="{{ route('tasks.create') }}" class="bg-main-400">Create</a>
        </div>
        @endcan
    </div>
</section>
@endsection