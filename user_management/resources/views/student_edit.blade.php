@extends('admin')

@section('content')
    <h1>Edit Student: {{ $student->name }}</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $student->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Student Email:</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $student->email }}" required>
        </div>

        <div class="form-group">
            <label for="sections">Sections:</label>
            <select name="sections[]" class="form-control" multiple required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}" {{ $student->sections->contains($section->id) ? 'selected' : '' }}>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
@endsection
