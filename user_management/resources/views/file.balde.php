@extends('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@section('content')
    <h2>Sections and Teachers</h2>

    @foreach($sections as $section)
        <div class="section-info">
            <h4>Section: {{ $section->name }}</h4>
            <h5>Users:</h5>
            <ul>
                @forelse($section->users as $user)
                    <li>{{ $user->name }}</li> <!-- Assuming there's a 'name' field in User -->
                @empty
                    <li>No users assigned to this section</li>
                @endforelse
            </ul>
        </div>
        <hr>
    @endforeach

    <!-- Other content here... -->

@endsection
</body>
</html>
