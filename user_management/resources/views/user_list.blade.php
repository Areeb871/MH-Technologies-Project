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
<style>
        .section-info { display: none; }
    </style>
    <script>
        function toggleSection(sectionId) {
            // Get all section info divs
            const allSections = document.querySelectorAll('.section-info');

            // Hide all sections
            allSections.forEach(section => {
                section.style.display = 'none';
            });

            // Show the clicked section
            const sectionInfo = document.getElementById(`section-info-${sectionId}`);
            sectionInfo.style.display = 'block';
        }
    </script>
<body>
@section('content')
@if(Auth::user()->roles->contains('name', 'teacher'))
    <h2>Sections</h2>
    <div>
        @foreach($sections as $section)
            <button class="btn btn-link" onclick="toggleSection({{ $section->id }})">
                {{ $section->name }}
            </button>
        @endforeach
    </div>
    
    @foreach($sections as $section)
        <div class="section-info" id="section-info-{{ $section->id }}">
            <h4>Section: {{ $section->name }}</h4>
            <h5>Users:</h5>
            <form action="{{ route('attendance.store', $section->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="attendance_date">Attendance Date:</label>
                    <input type="date" name="attendance_date" class="form-control" required>
                </div>
                <ul>
                    @forelse($section->users as $user)
                        <li>
                            {{ $user->name }}
                            <div class="form-group">
                                <select name="attendance[{{ $user->id }}]" class="form-control">
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                </select>
                            </div>
                        </li>
                    @empty
                        <li>No users assigned to this section</li>
                    @endforelse
                </ul>
                <button type="submit" class="btn btn-primary mt-3">Submit Attendance</button>
            </form>
        </div>
        <hr>
    @endforeach
@endif

    @if(Auth::user()->roles->contains('name', 'admin'))
        <a href="{{ route('user.create') }}">
            <button type="button" class="btn btn-warning">Create New User</button>
        </a>
        <div class="main-content">
            <div class="container form-container bg-light">
                <h2 class="text-center mb-4">User List</h2>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-striped text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user->isNotEmpty())
                            @foreach($user as $users)
                                <tr>
                                    <td>{{ $users->id }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>
                                        @if ($users->roles->isNotEmpty())
                                            @foreach($users->roles as $role)
                                                {{ $role->name }}@if (!$loop->last), @endif
                                            @endforeach
                                        @else
                                            No roles
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($users->created_at)->format('d M, Y') }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('user.edit', $users->id) }}">
                                            <button type="button" class="btn btn-primary">Edit</button>
                                        </a>
                                        <a href="#" onclick="deleteProduct({{ $users->id }})">
                                            <button type="button" class="btn btn-secondary">Delete</button>
                                        </a>
                                        <form id="delete-product-from-{{ $users->id }}" action="{{ route('user.destroy', $users->id) }}" method="post" style="display:none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No users found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
</body>
</html>

<script>
    function deleteProduct(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-product-from-" + id).submit();
                Swal.fire({
                    title: "Deleted!",
                    text: "The user has been deleted.",
                    icon: "success"
                });
            }
        });
    }
</script>
