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
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      flex-direction: column;
    }

    .form-container {
      max-width: 600px;
      width: 100%;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      background-color: #fff;
      margin: 0 auto; /* Centers the form horizontally */
      flex-grow: 1; /* Ensures the form grows and remains centered vertically */
    }

    /* Responsive Adjustments */
    @media (min-width: 992px) {
      .form-container {
        margin-top: 20px;
      }
    }

    /* Adjustments for mobile devices */
    @media (max-width: 768px) {
      .form-container {
        padding: 20px;
      }
    }

    .form-container h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>


@section('content')
<div class="container">
    <form action="{{ route('subcategory.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subcategories_name">Subcategory Name:</label>
            <input type="text" class="form-control" name="subcategories_name" required>
        </div>
        <div class="form-group mt-3">
            <label for="'category_id'">Select Main Category:</label>
            <select class="form-select" name="category_id" required>
                <option selected disabled>Choose a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categories_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Subcategory</button>
    </form>
</div>
@endsection


