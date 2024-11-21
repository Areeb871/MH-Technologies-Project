
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Centered Layout with Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Navbar styling */
    .navbar {
      top: 0;
      width: 100%;
      z-index: 6;
      background-color: #f8f9fa;
      font-size: large;
      border-bottom: 2px solid orange;
    }

    .navbar .navbar-brand {
      font-size: 40px;
      color: orange;
    }

    .navbar-nav .nav-item .nav-link {
      color: orange;
      padding: 14px 16px;
    }

    .navbar-nav .nav-item .nav-link:hover {
      background-color: orange;
      color: black;
    }

    /* Sidebar styling */
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: white;
      height: 100vh;
      position: fixed;
      top: 60px; /* Adjusted to be below the navbar */
      left: 0;
      display: flex;
      flex-direction: column;
      padding-top: 20px;
      z-index: 5;
      overflow-y: auto; /* Makes sidebar scrollable if necessary */
    }

    .sidebar a {
      color: #fff;
      padding: 15px;
      text-decoration: none;
      display: block;
      font-size: 18px;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    /* Subcategory styling */
    .subcategory a {
      padding-left: 30px; /* Indent the subcategory items */
      font-size: 16px; /* Slightly smaller font for subcategories */
    }

    /* Main content styling */
    .content {
      margin-left: 260px;
      padding: 20px;
      padding-top: 100px; /* Adjusted for navbar height */
    }

    /* Ensure content below sidebar doesn't scroll too much */
    .content1, .content2 {
      margin-left: 260px;
      padding: 20px;
      padding-top: 10px;
    }

    @media (max-width: 991.98px) {
      /* Responsive adjustments for smaller screens */
      .sidebar {
        width: 200px;
      }
      .content, .content1, .content2 {
        margin-left: 220px;
      }
    }

    @media (max-width: 767.98px) {
      /* Even more adjustments for smaller screens */
      .sidebar {
        width: 100%;
        position: relative;
        height: auto;
        z-index: 3;
      }

      .content, .content1, .content2 {
        margin-left: 0;
        padding-top: 100px; /* Adjust for navbar space */
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <i class="fa-brands fa-docker" style="color: #FFD43B;"></i> The Brand Store
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
  <a href="{{route('product.show')}}">Product</a>
  <!-- Categories dropdown -->
  <a href="#categoryDropdown" data-bs-toggle="collapse" aria-expanded="false">Categories</a>
  <div class="collapse" id="categoryDropdown">
    <div class="subcategory">
      <a href="{{route('catagery.show')}}">Main Category</a>
      <a href="{{route('subcategory.show')}}">Subcategory </a>
      <a href="{{ route('checkout.orderdetail') }}">Order Detail</a>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="content">
  @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
