@extends('admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <div class="container form-container bg-light">
            <h2 class="text-center mb-4">Link List</h2>
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
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if($link->isNotEmpty())
                        @foreach($link as $test)
                            <tr>
                                <td>{{ $test->id }}</td>
                                <td>{{ $test->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($test->created_at)->format('d M, Y') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No links found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
</body>
</html>
