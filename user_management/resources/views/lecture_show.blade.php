@extends('admin')

@section('content')
    <h1>Lecture Details</h1>

    <p><strong>Title:</strong> {{ $lecture->title }}</p>
    <p><strong>Description:</strong> {{ $lecture->description }}</p>
    <ul>
            @if($lecture->sections->isNotEmpty())
                @foreach($lecture->sections as $section)
                    <li>{{ $section->name }}</li>
                @endforeach
            @else
                <li>No sections associated with this lecture.</li>
            @endif
        </ul>
    <a href="{{ route('lectures.edit', $lecture->id) }}">Edit Lecture</a>

    <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Lecture</button>
    </form>

    <a href="{{ route('lectures.create') }}">Back to Lecture List</a>
@endsection
