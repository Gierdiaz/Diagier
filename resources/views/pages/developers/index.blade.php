<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Details</title>
    <link href="{{ asset('css/developers.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="#">Home</a>
        <a href="{{ route('developers.index') }}">Developers</a>
        <span>Developer Details</span>
    </div>
    <!-- Developer details -->
    <table class="developer">
        @foreach($developers as $developer)
        <tr>
        <td class="developer-details">
                <ul>
                    <li><strong>Name:</strong> {{ $developer->name }}</li>
                    <li><strong>Email:</strong> {{ $developer->email }}</li>
                    <li><strong>GitHub:</strong> {{ $developer->github }}</li>
                    <li><strong>Bio:</strong> {{ $developer->bio }}</li>
                    <li><strong>Technologies:</strong> {{ $developer->technologies }}</li>
                    <li><strong>College:</strong> {{ $developer->college }}</li>
                    <li><strong>Course:</strong> {{ $developer->course }}</li>
                    <li><strong>Certifications:</strong> {{ $developer->certifications }}</li>
                    <li><strong>Company:</strong> {{ $developer->company }}</li>
                    <li><strong>Level:</strong> {{ $developer->level }}</li>
                    <li><strong>City:</strong> {{ $developer->city }}</li>
                    <li><strong>State:</strong> {{ $developer->state }}</li>
                    <li><strong>Country:</strong> {{ $developer->country }}</li>
                    <li><strong>Work Mode:</strong> {{ $developer->work_mode }}</li>
                </ul>
            </td>
            <td class="developer-actions">
                <form method="POST" action="{{ route('developers.destroy', ['developer' => $developer->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="button button-delete" type="submit">Delete</button>
                </form>
                <a class="button" href="{{ route('developers.edit', ['developer' => $developer->id]) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- Button to create a new developer -->
    <a class="button-new" href="{{ route('developers.create') }}">New Developer</a>
</body>
</html>
