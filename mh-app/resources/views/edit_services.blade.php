@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
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
      background-color: #ffffff; /* White form background */
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); /* Softer shadow */
      border-radius: 15px; /* Rounded corners */
      border: 2px solid #0C2E8A; /* Light sky blue border */
    }
    h2 {
      font-size: 1.75rem;
      color: #0C2E8A; /* Darker blue for the heading */
    }
    label {
      font-weight: bold;
      color: #0C2E8A; /* Sky blue text for labels */
    }
    input[type="file"] {
      padding: 6px 12px;
    }
    .form-control {
      border-radius: 10px; /* More rounded input fields */
      box-shadow: none;
      border: 1px solid #0C2E8A; /* Light blue border */
    }
    .form-control:focus {
      border-color: #0C2E8A; /* Sky blue focus border */
      box-shadow: 0 0 0 0.2rem rgba(2, 136, 209, 0.25); /* Soft blue shadow */
    }
    .btn-primary {
      padding: 10px 20px;
      color: white; /* Text color set to white */
      background-color:#0C2E8A;
      border: none;
      border-radius: 10px;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color:#0C2E8A ; /* Darker blue on hover */
    }
    .invalid-feedback {
      font-size: 0.875rem;
      color: #d32f2f; /* Red error text */
    }
    /* Responsive styling */
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
  <h2 class="text-center mb-4">Edit Services</h2>
  <form enctype="multipart/form-data"action="{{ route('service.update',$services->id)}}" method="post">
    @method('put')
    @csrf
    <!-- Title -->
    <div class="mb-3">
      <label for="title" class="form-label"> Title</label>
      <input  value="{{old('title',$services->title)}}"type="text" class="class=@error ('title') is-invalid @enderror form-control" id="title" placeholder="Enter title"name="title">
      @error('title')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>
    <!-- Description -->
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" rows="5">{{ old('description', $services->description) }}</textarea>
    </div>
    <!-- Image Upload -->
    <div class="mb-3">
    <label for="image" class="form-label">Upload Image</label>
    <!-- Display current image if it exists -->
    @if(isset($services->image))
        <div class="mb-2">
        <img src="{{ asset('uploads/products/' . $services->image) }}" alt="Current Image" width="150" height="80">
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
      <button type="submit" class=" btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection
  </body>
</html>