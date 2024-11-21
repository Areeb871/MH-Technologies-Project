@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Link </title>
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
  <h2 class="text-center mb-4">Add Link </h2>
  <form enctype="multipart/form-data" action="{{ route('link.store')}}" method="post">
    @csrf
    <!-- Links-->
    <div class="mb-3">
      <label for="xlink" class="form-label">Twitter Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('xlink') }}" type="text" class="form-control @error('xlink') is-invalid @enderror" id="xlink" placeholder="Enter Twitter link" name="xlink">
      @error('xlink')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <!-- links -->
    <div class="mb-3">
      <label for="ilink" class="form-label">Insta Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('ilink') }}" type="text" class="form-control @error('link') is-invalid @enderror" id="ilink" placeholder="Enter Insta Link" name="ilink">
      @error('ilink')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <!-- links -->
    <div class="mb-3">
      <label for="flink" class="form-label">Facebook Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('flink') }}" type="text" class="form-control @error('link') is-invalid @enderror" id="flink" placeholder="Enter Facebook Link" name="flink">
      @error('flink')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <!-- Links -->
    <div class="mb-3">
      <label for="link" class="form-label">Linkdein Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('linkd') }}" type="text" class="form-control @error('linkd') is-invalid @enderror" id="linkd" placeholder="Enter Linkdein link" name="linkd">
      @error('linkd')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="link" class="form-label">Skype Link</label>
      <span style="color: black;">(optional)</span>
      <input value="{{ old('sklink') }}" type="text" class="form-control @error('sklink') is-invalid @enderror" id="sklink" placeholder="Enter Skype link" name="sklink">
      @error('sklink')
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
