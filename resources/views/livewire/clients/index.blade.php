<div>
    <div class="table-responsive">
        <table class="table table-bordered table-lg">
            <thead>
                <tr>
                    <th scope="col" style="color: #50bcb3;">Name</th>
                    <th scope="col" style="color: #50bcb3;">Surname</th>
                    <th scope="col" style="color: #50bcb3;">E-mail</th>
                    <th scope="col" style="color: #50bcb3;">Company</th>
                    <th scope="col" style="color: #50bcb3;">Position</th>
                    <th scope="col" style="color: #50bcb3;">Phone</th>
                    <th scope="col" style="color: #50bcb3;">Observation</th>
                    <th scope="col" style="color: #50bcb3;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surname }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->company }}</td>
                    <td>{{ $client->position }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->observation }}</td>
                    <td>
                        <div class="btn-group">
                            @can('update', $client)
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm square-btn"><i class="material-icons">edit</i></a>
                            @endcan
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                @can('delete', $client)
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
        {{ $clients->links() }}
    </div>
    @can('create', App\Models\client::class)
    <div class="mt-3">
        <a href="{{ route('clients.create') }}" class="btn btn-secondary" style="background-color: #50bcb3;">Create</a>
    </div>
    @endcan
</div>
