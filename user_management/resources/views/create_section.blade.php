@extends('admin')

@section('content')
<div class="container">
    <h2>Create New Section</h2>

    <!-- Form starts here -->
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="form-group">
       <label for="customSection">Enter Section Name</label>
       <input type="text" class="form-control" id="name" name="name" placeholder="Enter section name" required>
    </div>
        <button type="submit" class="btn btn-primary">Create Section</button>
    </form>
</div>
@endsection