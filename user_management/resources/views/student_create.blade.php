@extends('admin')

@section('content')
    <h1>Create New Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Student Name" required>
        </div>

        <div class="form-group">
            <label for="email">Student Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Student Email" required>
        </div>

        <div class="form-group">
            <label for="sections">Sections:</label>
            <select name="sections[]" class="form-control" multiple required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Student</button>
    </form>

@endsection
