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
    }
    .form-container {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .top-right-button {
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>
@section('content')
<div class="container form-container bg-light">
  <!-- Heading Text -->
  <h2 class="text-center mb-4">Edit Product</h2>
  <form enctype="multipart/form-data"action="{{ route('product.update',$products->id)}}" method="post">
    @method('put')
    @csrf
    <!-- Name -->
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input value="{{old('product_name',$products->product_name)}}"type="text" class="class=@error ('product_name') is-invalid @enderror form-control" id="name" placeholder="Enter name"name="product_name">
      @error('product_name')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>

    <!-- Model -->
    <div class="mb-3">
      <label for="model" class="form-label">Product Model</label>
      <input  value="{{old('product_model',$products->product_model)}}"ttype="text" class="class=@error ('product_model') is-invalid @enderror form-control" id="model" placeholder="Enter model"name="product_model">
      @error('product_model')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>

    <!-- Description -->
    <div class="mb-3">
  <label for="description" class="form-label">Product Description</label>
  <textarea 
    class="form-control @error('product_description') is-invalid @enderror" 
    id="description" 
    rows="3" 
    placeholder="Enter description" 
    name="product_description">{{ old('product_description'),$products->product_description }}</textarea>
  @error('product_description')
    <p class="invalid-feedback">{{ $message }}</p>
  @enderror
</div>
    <!-- Price -->
    <div class="mb-3">
      <label for="price" class="form-label">Product Price</label>
      <input  value="{{old('product_price',$products->product_price)}}"type="number"class="class=@error ('product_price') is-invalid @enderror form-control" id="price" placeholder="Enter price"name="product_price">
      @error('product_price')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>

    <!-- Image Upload -->
    <div class="mb-3">
      <label for="image" class="form-label">Upload Image</label>
      <input type="file"class="class=@error ('image') is-invalid @enderror form-control" id="image" accept="image/*" name="image">
      @if($products->image != '')
            <img width="30" src="{{asset('uploads/products/'.$products->image)}}" alt="Product Image">
            @endif
      @error('image')
      <p class="invalid-feedback">{{$message}}</p>
      @enderror()
    </div>

    <!-- Submit Button Centered -->
    <div class="text-center">
     <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>
</body>
@endsection
</html>