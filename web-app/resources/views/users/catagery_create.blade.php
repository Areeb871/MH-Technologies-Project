@extends('users.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 0;
      margin: 0;
      background-color: #f8f9fa; /* Light background for contrast */
    }

    /* Form Container */
    .container1 {
      margin-top: 120px; /* Adjusting margin to make space for the fixed navbar */
    }

    .form-container {
      max-width: 600px;
      width: 100%;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      background-color: #ffffff;
    }

    .form-container h2 {
      font-size: 26px;
      margin-bottom: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .form-container {
        padding: 20px;
      }
      h2 {
        font-size: 22px;
      }
    }

    @media (max-width: 576px) {
      .form-container {
        padding: 15px;
      }
      h2 {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>
@section('content')
<!-- Form Section -->
<div class="container1">
  <div class="container form-container bg-light">
    <h2 class="text-center mb-4">Add Category</h2>
    <form enctype="multipart/form-data" action="{{ route('catagery.store') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input value="{{ old('categories_name') }}" type="text" class="form-control @error('categories_name') is-invalid @enderror" id="name" placeholder="Enter category name" name="categories_name" required>
        @error('categories_name')
        <p class="invalid-feedback">{{ $message }}</p>
        @enderror
      </div>
      <!--
      <ul>
            @foreach($catagerys as $mainCategory)
                <li>
                    <h3>{{ $mainCategory->categories_name }}</h3>

                    @if($mainCategory->subcategories && $mainCategory->subcategories->isNotEmpty())
                        <ul>
                            @foreach($mainCategory->subcategories as $subcategory)
                                <li>{{ $subcategory->subcategories_name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No subcategories available.</p>
                    @endif

                    <a href="{{ route('subcategory.index') }}" class="btn btn-secondary">Add Subcategory</a>
                </li>
            @endforeach
        </ul>
  -->
      <div class="text-center">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>
</html>
