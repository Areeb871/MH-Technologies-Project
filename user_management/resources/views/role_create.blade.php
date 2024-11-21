<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<style>
/* Search Bar Styling */
    .search-bar-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px 0;
    }

    .search-bar-container input {
      max-width: 800px;
    }

    /* Icon and Button Container */
    .icon-container {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .icon-container i {
      font-size: 24px;
      color: orange;
    }

    .icon-container a {
      text-decoration: none;
      color: orange;
    }

    .icon-container .btn {
      padding: 5px 10px;
      font-size: 14px;
    }
    .logo-container {
      position: absolute;
      top: 20px;
      left: 20px;
    }

    .logo-container img {
      height: 40px; /* Adjust logo size */
    }


    /* Responsive adjustments */
    @media (max-width: 768px) {
      .icon-container {
        gap: 10px;
      }

      .icon-container i {
        font-size: 20px;
      }

      .icon-container .btn {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Role form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ old('name') }}" class=" @error('name') is-invalid @enderror form-control" id="name" name="name" placeholder="Enter name" required>
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Add Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
