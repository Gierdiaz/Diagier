@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header bg-blue">
                    <h4 class="mb-0 text-black">Create Project</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div style="display:flex; flex-direction:row;">
                            <div style="width:50%; display:inline;" class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" id="name">
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                <label for="client">Client:</label>
                                <input type="text" name="client" class="form-control" id="client">
                                @error('client') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div style="display:flex; flex-direction:row;">
                            <div style="width:50%; display:inline;" class="form-group">
                                <label for="description">Description:</label>
                                <textarea style="height:92%;" name="description" class="form-control" id="description"></textarea>
                                @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                <div class="form-group">
                                    <label for="technologies">Technologies:</label>
                                    <input type="text" name="technologies" class="form-control" id="technologies">
                                    @error('technologies') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                                <div style="display:flex; flex-direction:row;" class="form-group">
                                    <div style="width:50%; display:inline;" class="form-group">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" name="start_date" class="form-control" id="start_date">
                                        @error('start_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                    <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" name="end_date" class="form-control" id="end_date">
                                        @error('end_date') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div style="display:flex; flex-direction:row;" class="form-group">
                                    <div style="width:50%; display:inline;" class="form-group">
                                        <label for="budget">Budget:</label>
                                        <input type="number" step="0.01" name="budget" class="form-control" id="budget">
                                        @error('budget') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                    <div style="width:50%; display:inline; margin-left:1%;" class="form-group">
                                        <label for="status">Status:</label>
                                        <select name="status" class="form-control" id="status">
                                            <option value="progress">Progress</option>
                                            <option value="completed">Completed</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                        @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="developer_id">Developer:</label>
                                    <select name="developer_id[]" class="form-select" id="developer_id" multiple>
                                        @foreach($developers as $developer)
                                            <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="display:flex; flex-direction:row;" class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Create Project</button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary" style="margin-left:2px;">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<script>
    $('#developer_id').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
    allowClear: true,
    //data: data
} );
</script>
@endsection
