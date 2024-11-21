<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
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
                    <h3>Add User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ old('name') }}" class=" @error('name') is-invalid @enderror form-control" id="name" name="name" placeholder="Enter name" required>
                            @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" value="{{ old('email') }}" class=" @error('email') is-invalid @enderror form-control" id="email" name="email" placeholder="Enter email" required>
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
    <!-- Select Role -->
    <label for="role_id">Select Roles:</label>
    <select id="role_id" name="role_id[]" multiple aria-label="Select roles" style="width: 100%; height: 150px;">
        @foreach($users as $role)
            <option value="{{ $role->id }}" {{ in_array($role->id, old('role_id', [])) ? 'selected' : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
            <label for="sections">Sections:</label>
            <select name="sections[]" class="form-control" multiple required>
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
</div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Register</button>
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
