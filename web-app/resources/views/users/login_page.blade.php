<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    /* Global Styling */
    body {
      font-family: Arial, sans-serif;
    }
    /* Login Container */
    .login-container {
      min-height: 50vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }

    .login-form {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-button {
      display: flex;
      justify-content: center;
    }

    .login-button button {
      margin:10px;
      width: 100%;
      background-color: orange;
      border: none;
      padding: 10px;
      font-size: 16px;
      color: white;
      cursor: pointer;
    }

    .login-button button:hover {
      background-color: darkorange;
    }

    /* Buttons above the form */
    .button-group {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .button-group button {
      width: 48%;
      background-color:black ;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }

    .button-group button:hover {
      background-color: orange;
    }
  </style>
</head>
<body>
 @include('users.navbar')
<div class="login-container">
  <div class="login-form">
    <!-- Two buttons above the form -->
    <div class="button-group">
      <button>LogIn</button>
      <button>Register</button>
    </div>
  <div class="login-container">
    <form action="{{route('auth')}}" class="login-form" method="post">
      @csrf
      <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input value="{{old('email')}}" type="email" class="@error ('email') is-invalid @enderror form-control" id="username" placeholder="Enter email" name="email" required>
        @error('email')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror()
      </div>
      <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" class="@error ('password') is-invalid @enderror form-control" id="password" name="password" required>
        @error('password')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror()
      </div>
      <div class="login-button">
        <button type="submit" class="btn">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
