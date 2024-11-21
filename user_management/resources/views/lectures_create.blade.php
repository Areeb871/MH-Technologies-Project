@extends('admin')

@section('content')
    <h1>Create New Lecture</h1>

    <form action="{{ route('lectures.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Lecture Title:</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Lecture Title" required>
        </div>

        <div class="form-group">
            <label for="description">Lecture Description:</label>
            <textarea name="description" class="form-control" id="description" placeholder="Enter Lecture Description" required></textarea>
        </div>
        <div class="mb-3">
                <label for="sections" class="form-label">Sections</label>
                <select name="sections[]" class="form-control" multiple required>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Create Lecture</button>
    </form>

@endsection
