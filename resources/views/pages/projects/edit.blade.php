@extends('layout.layout')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Edit Project {{ $project->name }} </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div style="display:flex; flex-direction:row;">
                            <div style="width:50%; display:inline;" class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" id="name" value={{ $project->name }}>
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                <label for="client">Client:</label>
                                <input type="text" name="client" class="form-control" id="client" value={{ $project->client }}>
                                @error('client') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div style="display:flex; flex-direction:row;">
                            <div style="width:50%; display:inline;" class="form-group">
                                <label for="description">Description:</label>
                                <textarea style="height:92%;" name="description" class="form-control" id="description">{{ $project->description }}</textarea>
                                @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                <div class="form-group">
                                    <label for="technologies">Technologies:</label>
                                    <input type="text" name="technologies" class="form-control" id="technologies" value={{ $project->technologies }}>
                                    @error('technologies') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div style="display:flex; flex-direction:row;" class="form-group">
                                    <div style="width:50%; display:inline;" class="form-group">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" class="form-control" id="start_date" value={{ $project->start_date }}>
                                        @error('start_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                    <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" class="form-control" id="end_date" value={{ $project->end_date }}>
                                        @error('end_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction:row;" class="form-group">
                                    <div style="width:50%; display:inline;" class="form-group">
                                        <label for="budget">Budget:</label>
                                        <input type="number" step="0.01" name="budget" class="form-control" id="budget" value={{ $project->budget }}>
                                        @error('budget') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                    <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                        <label for="status">Status:</label>
                                        <select name="status" class="form-control" id="status">
                                            @foreach(['progress','completed','suspended'] as $status)
                                                <option value="{{ $status }}" {{ $project->status == $status ? 'selected' : '' }}>
                                                    {{ str_replace('_', ' ', ucfirst($status)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="developer_id">Developer:</label>
                                    <select name="developer_id[]" class="form-select w-100" id="developer_id" multiple>
                                        @foreach($developers as $developer)
                                            <option value="{{ $developer->id }}" {{ in_array($developer->id, $projectDevelopers) ? 'selected' : '' }}>
                                                {{ $developer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Developer</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<script>

    $('#developer_id').select2({
        theme: "bootstrap-5",
        width:  $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data( 'placeholder' ),
        closeOnSelect: false,
        allowClear: true
    });

</script>

@endsection
