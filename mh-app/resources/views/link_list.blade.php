@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Link</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
   
    .modal-dialog {
      max-width: 1000px;
    }
    .modal-body {
      max-height: 500px;
      overflow-y: auto;
    }
    .btn-primary {
      padding: 12px 24px;
      background-color: navy;
      border: none;
      color: white;
      border-radius: 50px;
      font-size: 18px;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
 
}

/* Hover effect */
.btn-primary:hover {
  background-color: navy;
      transform: scale(1.08); /* Slight zoom on hover */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}
    .action-buttons button {
      margin: 5px;
    }
    .btn-primary1 {
      padding: 8px 16px;
      color: white;
      background-color: #0C2E8A;
      border: none;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .btn-primary1:hover {
      background-color: #09235b;
    }
    .btn-attractive {
      padding: 12px 24px;
      background-color: navy;
      border: none;
      color: white;
      border-radius: 50px;
      font-size: 18px;
      font-weight: bold;
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Hover effect for the new button */
    .btn-attractive:hover {
      background-color: navy;
      transform: scale(1.08); /* Slight zoom on hover */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
@section('content')
<!-- Main Content -->
<div class="main-content">
  <div class="container form-container bg-light">
    <h2 class="text-center mb-4">Link List</h2>
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="container mt-2">
      <!-- Button to open modal -->
      <button type="button" class="btn-primary" data-bs-toggle="modal" data-bs-target="#viewLinksModal">View All Links</button>
      <a href="{{route('link.create')}}">
 <button type="button" class="btn-attractive mt-3">Add link</button>
  </a>
      <!-- Modal Structure -->
      <div class="modal fade" id="viewLinksModal" tabindex="-1" aria-labelledby="viewLinksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewLinksModalLabel">Social Links</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-striped text-center align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Twitter</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">LinkedIn</th>
                    <th scope="col">Skype</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  @if($link->isNotEmpty())
                    @foreach($link as $test)
                      <tr>
                        <td data-label="ID">{{$test->id}}</td>
                        <td data-label="Twitter">{{$test->xlink}}</td>
                        <td data-label="Instagram">{{$test->ilink}}</td>
                        <td data-label="Facebook">{{$test->flink}}</td>
                        <td data-label="LinkedIn">{{$test->linkd}}</td>
                        <td data-label="Skype">{{$test->sklink}}</td>
                        <td data-label="Created Date">{{\Carbon\Carbon::parse($test->created_at)->format('d M,Y')}}</td>
                        <td data-label="Action" class="action-buttons d-flex justify-content-center">
                  <a href="{{route ('link.edit',$test->id)}}">
                    <button type="submit" class="btn-primary1">Edit</button>
                  </a>
                  <a href="#" onclick="deleteProduct({{$test->id}})">
                    <button type="reset" class="btn btn-secondary">Delete</button>
                  </a>
                  <form id="delete-product-from-{{$test->id}}" action="{{route ('link.destroy',$test->id)}}" method="post" style="display:none;">
                    @csrf
                    @method('delete')
                  </form>
                </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="7">No Links Found</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-primary1" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
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
