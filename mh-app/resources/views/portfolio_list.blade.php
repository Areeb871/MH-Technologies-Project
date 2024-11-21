@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f9f9f9;
      font-family: 'Arial', sans-serif;
      overflow-x: hidden;
      padding: 20px;
    }
    .form-container {
      max-width: 100%;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      background-color: #fff;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      margin-top: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    table th, table td {
      padding: 15px;
      vertical-align: middle;
    }
    table img {
      width: 80px;
      height: auto;
      border-radius: 4px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    .action-buttons button {
      margin: 5px;
    }
    .btn-primary {
      padding: 8px 16px;
      color: white;
      background-color: #0C2E8A;
      border: none;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #09235b;
    }
    .btn-secondary {
      background-color: #f4f4f4;
      border: none;
      border-radius: 8px;
    }
    .search-bar input {
      border-radius: 50px;
      padding: 10px 20px;
      border: 1px solid #ddd;
      width: calc(100% - 60px);
    }
    .search-bar button {
      padding: 8px 12px;
      background-color: #0C2E8A;
      border: none;
      color: white;
      border-radius: 6px;
     
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .action-buttons {
    display: flex;
    flex-direction: column;
    width: 100%;
  }
  
  .action-buttons button {
    width: 100%; /* Make buttons full width */
    margin: 5px 0; /* Adjust margin for spacing between buttons */
  }
  
      table th {
        display: none;
      }
      table td {
        display: block;
        width: 100%;
        text-align: left;
        padding: 10px;
        border-top: 1px solid #ddd;
        position: relative;
      }
      table td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #333;
      }
      .action-buttons {
        justify-content: center;
        flex-wrap: wrap;
      }
    }
  </style>
</head>
<body>
@section('content')
<div class="search-bar">
   <form class="search-form d-flex align-items-center" method="GET" action="{{ route('portfolio.search') }}">
     <input type="text" name="query" placeholder="Search" title="Enter search keyword">
     <button type="submit" title="Search"><i class="bi bi-search"></i></button>
   </form>
</div><!-- End Search Bar -->

<div class="main-content">
  <div class="container form-container bg-light">
    <h2 class="text-center mb-4">Portfolio List</h2>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container mt-2">
      <a href="{{route('portfolio.create')}}">
        <button type="submit" class="btn-primary">Add Portfolio</button>
      </a>
      <div class="table-container">
        <table class="table table-striped text-center align-middle">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Type</th>
              <th scope="col">Link</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if($test->isNotEmpty())
            @foreach($test as $test)
            <tr>
              <td data-label="ID">{{$test->id}}</td>
              <td data-label="Title">{{$test->title}}</td>
              <td data-label="Description">{{$test->description}}</td>
              <td data-label="Type">{{$test->type}}</td>
              <td data-label="Link"><a href="{{$test->link}}" target="_blank">{{$test->link}}</a></td>
              <td data-label="Image">
                @if($test->image != '')
                <img src="{{asset('uploads/products/'.$test->image)}}" alt="Portfolio Image">
                @endif
              </td>
              <td data-label="Action" class="action-buttons d-flex justify-content-center">
                <a href="{{route ('portfolio.edit',$test->id)}}">
                  <button type="submit" class="btn-primary">Edit</button>
                </a>
                <a href="#" onclick="deleteProduct({{$test->id}})">
                  <button type="reset" class="btn btn-secondary">Delete</button>
                </a>
                <form id="delete-product-from-{{$test->id}}" action="{{route ('portfolio.destroy',$test->id)}}" method="post" style="display:none;">
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
          text: "Your portfolio item has been deleted.",
          icon: "success"
        });
      }
    });
  }
</script>
@endsection
</body>
</html>
