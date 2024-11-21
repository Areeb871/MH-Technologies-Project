@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonials</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
  background-color: #f0f2f5; /* Light gray background for both forms */
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: Arial, sans-serif;
}

.form-container {
  max-width: 600px;
  width: 100%;
  padding: 30px;
  background-color: #ffffff;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); /* Unified shadow for both forms */
  border-radius: 15px; /* More rounded corners */
  border: 2px solid #0C2E8A; /* Sky blue border */
}

h2 {
  font-size: 1.75rem;
  color: #0C2E8A; /* Unified heading color */
}

label {
  font-weight: bold;
  color: #0C2E8A; /* Sky blue for labels */
}

input[type="file"] {
  padding: 6px 12px;
}

.form-control {
  border-radius: 10px;
  box-shadow: none;
  border: 1px solid #0C2E8A; /* Light blue border */
}

.form-control:focus {
  border-color: #0C2E8A;
  box-shadow: 0 0 0 0.2rem rgba(2, 136, 209, 0.25); /* Unified focus shadow */
}

.btn-primary {
  padding: 10px 20px;
  color: white;
  background-color: #0C2E8A;
  border: none;
  border-radius: 10px;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #0A2570; /* Slightly darker on hover */
}

.invalid-feedback {
  font-size: 0.875rem;
  color: #d32f2f; /* Unified error text color */
}

/* Responsive styling for both forms */
@media (max-width: 768px) {
  .form-container {
    padding: 20px;
  }
  h2 {
    font-size: 1.5rem;
  }
}
</style>
</head>
<body>
@section('content')
<div class="container form-container bg-light">
  <!-- Heading Text -->
  <h2 class="text-center mb-4">Edit Testimonials</h2>
  <form enctype="multipart/form-data"action="{{ route('testimonial.update',$tests->id)}}" method="post">
    @method('put')
    @csrf
    <!-- name -->
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input  value="{{old('name',$tests->name)}}"type="text" class="class=@error ('name') is-invalid @enderror form-control" id="name" placeholder="Enter name"name="name">
      @error('name')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>
    <!-- Profession -->
    <div class="mb-3">
      <label for="profession" class="form-label">Profession</label>
      <input  value="{{old('profession',$tests->profession)}}"type="text" class="class=@error ('profession') is-invalid @enderror form-control" id="profession" placeholder="Enter profession"name="profession">
      @error('profession')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>
       <!-- Description -->
       <div class="mb-3">
        <label for="review">Review</label>
        <textarea id="review" name="review" class="form-control" rows="5">{{ old('review', $tests->review) }}</textarea>
    </div>
    <!-- Image Upload -->
    <div class="mb-3">
    <label for="image" class="form-label">Upload Image</label>
    <!-- Display current image if it exists -->
    @if(isset($tests->image))
        <div class="mb-2">
        <img src="{{ asset('uploads/products/' . $tests->image) }}" alt="Current Image" width="150" height="80">
        </div>
    @endif

    <!-- File input for uploading new image -->
    <input type="file" 
           class="form-control @error('image') is-invalid @enderror" 
           id="image" 
           accept="image/*" 
           name="image">
           
    <!-- Display validation error for image input -->
    @error('image')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>

    <!-- Submit Button Centered -->
    <div class="text-center">
      <button type="submit" class="btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection
</body>
</html>