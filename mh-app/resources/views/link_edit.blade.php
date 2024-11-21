@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team</title>
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
      max-width: 450px; /* Shrink form width */
      width: 100%;
      padding: 20px; /* Decrease padding */
      background-color: #ffffff; /* White form background */
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Softer shadow */
      border-radius: 10px; /* Rounded corners */
      border: 2px solid #0C2E8A; /* Light sky blue border */
    }
    h2 {
      font-size: 1.5rem; /* Smaller heading size */
      color: #0C2E8A; /* Darker blue for the heading */
    }
    label {
      font-weight: bold;
      color: #0C2E8A; /* Sky blue text for labels */
    }
    input[type="file"] {
      padding: 4px 10px; /* Smaller padding */
    }
    .form-control {
      border-radius: 8px; /* More rounded input fields */
      box-shadow: none;
      border: 1px solid #0C2E8A; /* Light blue border */
    }
    .form-control:focus {
      border-color: #0C2E8A; /* Sky blue focus border */
      box-shadow: 0 0 0 0.15rem rgba(2, 136, 209, 0.2); /* Soft blue shadow */
    }
    .btn-primary {
      padding: 8px 16px; /* Reduced padding for the button */
      color: white; /* Text color set to white */
      background-color: #0C2E8A;
      border: none;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #0C2E8A; /* Darker blue on hover */
    }
    .invalid-feedback {
      font-size: 0.875rem;
      color: #d32f2f; /* Red error text */
    }
    /* Responsive styling */
    @media (max-width: 768px) {
      .form-container {
        padding: 15px; /* Reduced padding on small screens */
      }
      h2 {
        font-size: 1.25rem; /* Smaller heading on mobile */
      }
    }
  </style>
</head>
<body>
@section('content')
<div class="container form-container bg-light">
  <!-- Heading Text -->
  <h2 class="text-center mb-4">Edit Link</h2>
  <form enctype="multipart/form-data" action="{{ route('link.update', $links->id) }}" method="post">
    @method('put')
    @csrf
     <!-- Links-->
     <div class="mb-3">
      <label for="xlink" class="form-label">Twitter Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('xlink', $links->xlink ?? '') }}" type="text" class="form-control @error('xlink') is-invalid @enderror" id="xlink" placeholder="Enter Twitter link" name="xlink">
      @error('xlink')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <!-- links -->
    <div class="mb-3">
      <label for="ilink" class="form-label">Insta Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('ilink', $links->ilink ?? '') }}" type="text" class="form-control @error('link') is-invalid @enderror" id="ilink" placeholder="Enter Insta Link" name="ilink">
      @error('ilink')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <!-- links -->
    <div class="mb-3">
      <label for="flink" class="form-label">Facebook Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('flink', $links->flink ?? '') }}" type="text" class="form-control @error('link') is-invalid @enderror" id="flink" placeholder="Enter Facebook Link" name="flink">
      @error('flink')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <!-- Links -->
    <div class="mb-3">
      <label for="linkd" class="form-label">LinkedIn Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('linkd', $links->linkd ?? '') }}" type="text" class="form-control @error('linkd') is-invalid @enderror" id="linkd" placeholder="Enter LinkedIn link" name="linkd">
      @error('linkd')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="sklink" class="form-label">Skype Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('sklink', $links->sklink ?? '') }}" type="text" class="form-control @error('sklink') is-invalid @enderror" id="sklink" placeholder="Enter Skype link" name="sklink">
      @error('sklink')
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
