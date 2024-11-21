@extends('users.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .form-container {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .form-container {
        max-width: 100%;
        padding: 15px;
      }
      h2 {
        font-size: 24px;
      }
    }

    @media (max-width: 576px) {
      .form-container {
        padding: 10px;
      }
      h2 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
@section('content')
<div class="container form-container">
  <h2 class="text-center mb-4">Edit SubCategory</h2>
  <form enctype="multipart/form-data" action="{{ route('subcategory.update', $subcatagery->id) }}" method="post">
    @method('put')
    @csrf
    <!-- Category Name Field -->
    <div class="mb-3">
      <label for="name" class="form-label">Sub Category Name</label>
      <input value="{{ old('subcategories_name', $subcatagery->subcategories_name) }}" type="text" class="form-control @error('subcategories_name') is-invalid @enderror" id="name" placeholder="Enter category name" name="subcategories_name">
      @error('subcategories_name')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Submit Button Centered -->
    <div class="text-center">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>
@endsection
</body>
</html>
