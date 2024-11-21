@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Banner </title>
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
<div class="container form-container">
  <!-- Heading Text -->
  <h2 class="text-center mb-4">Add Banner Video</h2>
  <form enctype="multipart/form-data" action="{{ route('banners.store')}}" method="post">
    @csrf
    <!-- Video Upload -->
    <div class="mb-3">
      <label for="video" class="form-label">Upload Video</label>
      <input type="file" class="form-control @error('video') is-invalid @enderror" id="video" accept="video/*" name="video">
      @error('video')
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
