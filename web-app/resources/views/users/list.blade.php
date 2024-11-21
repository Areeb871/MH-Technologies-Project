@extends('users.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f4f4f4;
      display: flex;
      overflow: hidden; /* Prevents scrolling */
      min-height: 100vh;
    }
    .form-container {
      max-width: 100%;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      background-color: white;
    }
    table img {
      width: 100px;
      height: auto;
      border-radius: 4px;
    }
    .action-buttons {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
    }
    .table-container {
      max-height: calc(100vh - 200px); /* Adjust this for navbar height */
      overflow-y: auto; /* To allow scrolling inside the table if needed */
    }
    button {
      min-width: 30%;
    }
  </style>
</head>
<body>
@section('content')
  <div class="main-content">
    <div class="container form-container bg-light">
      <!-- Heading Text -->
      <h2 class="text-center mb-4">List Product</h2>
      <div class="container mt-2">
        <a href="{{route('product.create')}}">
          <button type="submit" class="btn btn-warning ">Add Product</button>
        </a>
        <div class="table-container">
          <table class="table table-striped text-center align-middle">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">cat</th>
                <th scope="col">subcat</th>
                <th scope="col">Name</th>
                <th scope="col">Model</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Date Created</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @if($products->isNotEmpty())
              @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->category->categories_name ?? 'N/A'}}</td>
                <td>{{$product->subcategory->subcategories_name ?? 'N/A'}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_model}}</td>
                <td>{{$product->product_description}}</td>
                <td>{{$product->product_price}}</td>
                <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M,Y')}}</td>
                <td>
                  @if($product->image != '')
                  <img src="{{asset('uploads/products/'.$product->image)}}" alt="Product Image">
                  @endif
                </td>
                <td class="action-buttons">
                  <a href="{{route ('product.edit',$product->id)}}">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </a>
                  <a href="#" onclick="deleteProduct({{$product->id}})">
                    <button type="reset" class="btn btn-secondary">Delete</button>
                  </a>
                  <form id="delete-product-from-{{$product->id}}" action="{{route ('product.destroy',$product->id)}}" method="post" style="display:none;">
                    @csrf
                    @method('delete')
                  </form>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
  <script>
    function deleteProduct(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("delete-product-from-" + id).submit();
          Swal.fire({
            title: "Deleted!",
            text: "Your product has been deleted.",
            icon: "success"
          });
        }
      });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
