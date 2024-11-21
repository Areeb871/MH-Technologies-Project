@extends('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container form-container bg-light">
            <h2 class="text-center mb-4">Lecture List</h2>
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
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($lectures->isNotEmpty())
                        @foreach($lectures as $lecture)
                            <tr>
                                <td>{{ $lecture->id }}</td>
                                <td>{{ $lecture->title }}</td>
                                <td>{{ $lecture->description }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('lectures.edit', $lecture->id) }}">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="#" onclick="deleteProduct({{ $lecture->id }})">
                                        <button type="button" class="btn btn-secondary">Delete</button>
                                    </a>
                                    <form id="delete-product-from-{{ $lecture->id }}" action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No lectures found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
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
                    text: "Your lecture has been deleted.",
                    icon: "success"
                });
            }
        });
    }
</script>
