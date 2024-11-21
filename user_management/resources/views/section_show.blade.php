@extends('admin')

@section('content')
    <h1>Section Details</h1>

    <p><strong>Section Name:</strong> {{ $section->name }}</p>

    <h3>Lectures in this Section</h3>
    <ul>
        @foreach($section->lectures as $lecture)
        <a href="{{ route('lectures.show', $lecture->id) }}">{{ $lecture->title }}</a>
        @endforeach
    </ul>
    <a href="{{ route('sections.edit', $section->id) }}">Edit Section</a>

    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Section</button>
    </form>

    <a href="{{ route('sections.create') }}">Back to Section List</a>
@endsection
