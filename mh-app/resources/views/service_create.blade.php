@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service</title>
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
  <div class="container form-container">
    <!-- Heading Text -->
    <h2 class="text-center mb-4">Add Service</h2>
    <form enctype="multipart/form-data" action="{{ route('service.store')}}" method="post">
      @csrf
      <!-- Name -->
      <div class="mb-3">
        <label for="title" class="form-label">Service Title</label>
        <input value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title">
        @error('title')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>
      <!-- Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Service Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Enter description" name="description">{{ old('description') }}</textarea>
        @error('description')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>
      <!-- Image Upload -->
      <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" name="image">
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
