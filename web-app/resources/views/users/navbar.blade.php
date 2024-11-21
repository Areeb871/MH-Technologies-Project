<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    /* Global Styling */
    body {
      font-family: Arial, sans-serif;
    }

    /* Logo Container */
    .logo-container {
      position: absolute;
      top: 20px;
      left: 20px;
    }

    .logo-container img {
      height: 50px;
    }
    .container {
      padding: 20px;
    }

    /* Search Form Styling */
    .search-form {
      display: flex;
      justify-content: center; /* Center the form horizontally */
      align-items: center; /* Center the form vertically if needed */
      flex-wrap: wrap; /* Allow wrapping of items */
    }

    /* Search Input Styling */
    .search-input {
      width: 100%; /* Full width for small screens */
      max-width: 300px; /* Maximum width */
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px 0 0 4px;
      outline: none;
      font-size: 16px;
      box-sizing: border-box; /* Include padding in width calculation */
    }

    /* Search Button Styling */
    .search-button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: 1px solid #007bff;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
      font-size: 16px;
      box-sizing: border-box; /* Include padding in width calculation */
    }

    /* Hover Effect */
    .search-button:hover {
      background-color: #0056b3;
      border-color: #0056b3;
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

    .icon-container .account-links {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .icon-container .account-links a {
      text-decoration: none;
      color: #333;
      display: block;
      font-size: 16px;
      text-align: center;
    }

    .icon-container .account-links a:hover {
      color: orange;
    }
    .navbar {
      background-color: orange;
      border: none;
      border-radius: 0;
      margin-bottom: 0;
    }

    .navbar-brand,
    .navbar-nav > li > a {
      color: white !important;
      font-size: 16px;
      padding-top: 15px;
      padding-bottom: 15px;
    }

    .navbar-nav > li > a:hover,
    .navbar-nav > .dropdown:hover .dropdown-toggle {
      background-color: orange;
      color: white !important;
    }

    /* Dropdown Menu Styling */
    .dropdown-menu {
      background-color: orange;
      border-radius: 2px;
      min-width: 160px;
      border: none;
    }

    .dropdown-menu > li > a {
      color: #333;
      padding: 10px 20px;
    }

    .dropdown-menu > li > a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Dropdown Arrow */
    .caret {
      border-top: 4px solid white;
    }  
    @media (max-width: 787px) {
      .search-input {
        margin-left: 70px;  
        margin-top: 50px;
      }
      .search-button {
        margin-top: 50px;
      }

      .icon-container .icon {
        display: none;
        font-size: 18px; /* Further reduce icon size for very small screens */
      }
      .navbar
      {
        display:none;
      }
    }

    @media (min-width: 300px) and (max-width: 590px) {
      .search-form {
        flex-direction: row; /* Align items side by side */
        align-items: center; /* Center items vertically */
        justify-content: center; /* Center items horizontally */
        margin: 0 auto; /* Center the form horizontally */
        padding: 10px; /* Add padding for better spacing */
        margin-top: 40px;
      }

      .search-input {
        width: 100%; /* Full width for smaller screens */
        max-width: 200px; /* Limit the maximum width of the input */
        border-radius: 4px 0 0 4px; /* Rounded corners on left side */
        border: 1px solid #ccc; /* Border color */
        padding: 10px; /* Padding inside input */
        margin: 0; /* Remove margin */
      }

      .search-button {
        width: auto; /* Button width based on content */
        border-radius: 0 4px 4px 0; /* Rounded corners on right side */
        background-color: #007bff; /* Button background color */
        color: white; /* Button text color */
        border: 1px solid #007bff; /* Button border color */
        padding: 10px 20px; /* Padding inside button */
        font-size: 16px; /* Font size */
        margin: 0; /* Remove margin */
      }

      .search-button:hover {
        background-color: #0056b3; /* Button hover background color */
        border-color: #0056b3; /* Button hover border color */
      }

      .icon-container .icon {
        font-size: 18px; /* Adjust icon size for smaller screens */
      }
      .navbar
      {
        display:none;
      }
    }
  </style>
</head>
<body>
<div class="logo-container">
    <img src="/images/picture1.PNG" alt="Logo">
  </div>

  <div class="container">
    <form class="search-form">
      <input type="text" placeholder="Search..." class="search-input">
      <button type="submit" class="search-button">Search</button>
    </form>
  </div>

  <div class="icon-container">
    <a class="icon" href="#"><i class="fa-regular fa-heart"></i></a>
    <a class="icon1" href="{{route('addtocart.create')}}"><i class="fas fa-cart-shopping"></i></a>
    <a class="icon2" href="{{ route('users.login') }}"><i class="fa-solid fa-user"></i></a>
    <div class="account-links">
      <a href="{{ route('users.index') }}" class="signup">Sign Up</a>
      <a href="{{ route('users.login') }}" class="login">Login</a>
    </div>
  </div>

  <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Navbar links, including dropdown -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="{{route('checkout.userdashboard')}}">Tracking order</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="login-container">
  <div class="login-form">
</body>
</html>