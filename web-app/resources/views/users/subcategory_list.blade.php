@extends('users.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .form-container {
      max-width: 900px;
      width: 100%;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      background-color: white;
      overflow-y: hidden;
    }
    .action-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
    }
    .btn {
      min-width: 100px;
    }
    table {
      width: 100%;
      text-align: center;
    }
    table th, table td {
      padding: 15px;
      vertical-align: middle;
    }
  </style>
</head>
<body>
@section('content')
<div class="sidebar">
  <a href="">Product</a>
  <a href="">Categories</a>
</div>

<div class="main-content">
  <div class="form-container">
    <h2 class="text-center mb-4">List SubCategory</h2>
    <div class="text-end mb-3">
      <a href="{{ route('subcategory.index'),}}">
        <button type="submit" class="btn btn-warning">Add SubCategory</button>
      </a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if($subcatagerys->isNotEmpty())
          @foreach($subcatagerys as $subcategory)
          <tr>
            <td>{{ $subcategory->id }}</td>
            <td>{{ $subcategory->subcategories_name }}</td>
            <td>{{ $subcategory->created_at }}</td>
            <td class="action-buttons">
              <a href="{{ route('subcategory.edit', $subcategory->id) }}">
                <button type="submit" class="btn btn-primary">Edit</button>
              </a>
              <a href="#" onclick="deleteCategory({{ $subcategory->id }})">
                <button type="reset" class="btn btn-secondary">Delete</button>
              </a>
              <form id="delete-category-form-{{ $subcategory->id }}" action="{{ route('subcategory.destroy', $subcategory->id) }}" method="post" style="display:none;">
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
@endsection
<script>
function deleteCategory(id) {
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
      document.getElementById("delete-category-form-" + id).submit();
      Swal.fire({
        title: "Deleted!",
        text: "Your category has been deleted.",
        icon: "success"
      });
    }
  });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
