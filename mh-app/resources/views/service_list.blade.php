@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service List</title>
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
   <form class="search-form d-flex align-items-center" method="GET" action="{{ route('service.search') }}">
     <input type="text" name="query" placeholder="Search" title="Enter search keyword">
     <button type="submit" title="Search"><i class="bi bi-search"></i></button>
   </form>
</div><!-- End Search Bar -->
  <div class="main-content">
    <div class="container form-container bg-light">
      <!-- Heading Text -->
      <h2 class="text-center mb-4">Service List</h2>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
      <div class="container mt-2">
        <a href="{{route('service.create')}}">
          <button type="submit" class="btn-primary ">Add Service</button>
        </a>
        <div class="table-container mt-3">
          <table class="table table-striped text-center align-middle">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date Created</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @if($services->isNotEmpty())
              @foreach($services as $service)
              <tr>
                <td data-label="ID">{{$service->id}}</td>
                <td data-label="Title">{{$service->title}}</td>
                <td data-label="Description">{{$service->description}}</td>
                <td data-label="Created Date">{{\Carbon\Carbon::parse($service->created_at)->format('d M,Y')}}</td>
                <td data-label="Image">
                  @if($service->image != '')
                  <img src="{{asset('uploads/products/'.$service->image)}}" alt="service Image">
                  @endif
                </td>
                <td data-label="Action" class="action-buttons d-flex justify-content-center">
                  <a href="{{route ('service.edit',$service->id)}}">
                    <button type="submit" class="btn-primary">Edit</button>
                  </a>
                  <a href="#" onclick="deleteProduct({{$service->id}})">
                    <button type="reset" class="btn btn-secondary">Delete</button>
                  </a>
                  <form id="delete-product-from-{{$service->id}}" action="{{route ('service.destroy',$service->id)}}" method="post" style="display:none;">
                    @csrf
                    @method('delete')
                  </form>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="6">No services found.</td>
              </tr>
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
            text: "Your product has been deleted.",
            icon: "success"
          });
        }
      });
    }
  </script>
</body>
</html>
@endsection
