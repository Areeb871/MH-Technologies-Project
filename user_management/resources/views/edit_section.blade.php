@extends('admin')

@section('content')
<div class="container">
    <h2>Edit Section</h2>

    <!-- Form starts here -->
    <form action="{{ route('sections.update', $section->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT or PATCH if you want to be explicit -->
        
        <div class="form-group">
            <label for="customSection">Enter Section Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $section->name) }}" placeholder="Enter section name" required>
        </div>
 
        <button type="submit" class="btn btn-primary">Update Section</button>
    </form>
</div>
@endsection
