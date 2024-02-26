<div>
    <div class="table-responsive">
        <table class="table table-bordered table-lg">
            <thead>
                <tr>
                    <th scope="col" style="color: #50bcb3;">ID</th>
                    <th scope="col" style="color: #50bcb3;">Name</th>
                    <th scope="col" style="color: #50bcb3;">Description</th>
                    <th scope="col" style="color: #50bcb3;">Technologies</th>
                    <th scope="col" style="color: #50bcb3;">Start Date</th>
                    <th scope="col" style="color: #50bcb3;">End Date</th>
                    <th scope="col" style="color: #50bcb3;">Status</th>
                    <th scope="col" style="color: #50bcb3;">Developer</th>
                    <th scope="col" style="color: #50bcb3;">Actions</th>
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
        <a href="{{ route('projects.create') }}" class="btn btn-secondary" style="background-color: #50bcb3;">Create</a>
    </div>
    @endcan 
</div>