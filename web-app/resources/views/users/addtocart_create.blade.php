<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <!-- Bootstrap CSS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
      margin-top: 80px;
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
    .container-search {
    padding: 20px;
}

/* Search Form Styling */
.search-form-custom {
    display: flex;
    justify-content: center; /* Center the form horizontally */
    align-items: center; /* Center the form vertically if needed */
    flex-wrap: wrap; /* Allow wrapping of items */
}

/* Search Input Styling */
.search-input-custom {
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
.search-button-custom {
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
.search-button-custom:hover {
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
  padding: 15px 0;
}
.navbar-header .navbar-brand {
  color: white !important;
  font-size: 16px;
  padding: 15px 20px; /* Control padding around the brand */
}

.navbar-nav > li {
  margin: 0; /* Remove default margin between items */
}

.navbar-nav > li > a {
  color: white !important;
  font-size: 16px;
  padding: 15px 20px; /* Adjust padding for uniformity */
}
.navbar-nav > li > a:hover {
  background-color: rgba(255, 165, 0, 0.7); /* Slightly darker orange on hover */
  color: white !important;
}
.cart-container {
    width:80%;
    margin: auto;
}

.table {
    width: 100%;
    margin-bottom: 30px; /* Add bottom margin to table for spacing */
}

.product-img {
    width: 100px; /* Set a fixed width for the product image */
    height: auto;
    margin-bottom: 15px; /* Space below product image */
}

.product-info {
    display: flex;
    flex-direction: column; /* Stack the product name and model vertically */
    align-items: center; /* Center-align text */
    margin-bottom: 20px; /* Space below product info */
}

.product-details {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center-align product details */
    margin-bottom: 25px; /* Space below product details */
}

.update-btn {
    background-color: orange; /* Orange color for the button */
    color: white; /* Text color */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    padding: 10px 15px; /* Padding */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size */
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    margin-top: 10px; /* Space above the button */
}

.update-btn:hover {
    background-color: black; /* Darker color on hover */
}

.delete-icon {
    font-size: 24px; /* Icon size */
    color: #dc3545; /* Red color */
    cursor: pointer; /* Pointer cursor on hover */
    transition: color 0.3s ease; /* Smooth transition for hover effect */
    margin-top: 10px; /* Space above the delete icon */
}

.delete-icon:hover {
    color: #c82333; /* Darker red on hover */
}
.checkout-button {
  background-color: orange; /* Button background color */
  border: none; /* No border */
  color: white; /* Text color */
  font-size: 16px; /* Font size */
  padding: 10px 20px; /* Padding around the text */
  text-align: center; /* Center align text */
  text-decoration: none; /* Remove underline from link */
  border-radius: 5px; /* Rounded corners */
  transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.checkout-button:hover {
  background-color: darkorange; /* Darker shade on hover */
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
      .checkout-button {
      margin-left:100px;
      }

     .update-btn {
    border-radius: 2px; /* Rounded corners */
    padding: 5px 10px; /* Padding */
    font-size: 16px; /* Font size */
    }
     .delete-icon {
    font-size: 20px; /* Icon size */
    }
    .product-img {
    width: 70px; /* Set a fixed width for the product image */
   }
    }
  </style>
</head>
<body>
<div class="logo-container">
    <img src="/images/picture1.PNG" alt="Logo">
</div>
  <div class="icon-container">
    <a class="icon" href="#"><i class="fa-regular fa-heart"></i></a>
    <a class="icon1" href="#"><i class="fas fa-cart-shopping"></i></a>
    <a class="icon2" href="{{ route('users.login') }}"><i class="fa-solid fa-user"></i></a>
    <div class="account-links">
      <a href="{{ route('users.index') }}" class="signup">Sign Up</a>
      <a href="{{ route('users.login') }}" class="login">Login</a>
    </div>
  </div>
  <nav class="navbar navbar-default">
  <div class="container">
    <!-- Navbar items -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Brand</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="{{route('checkout.userdashboard')}}">Tracking order</a></li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container cart-container">
    <!-- Heading Text -->
    <h2 class="text-center mb-4">Shopping Cart</h2>

    @if($cart->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Your cart is empty!
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $cartItem)
                    <tr>
                        <td>
                            @if($cartItem->product->image != '')
                                <img src="{{ asset('uploads/products/' . $cartItem->product->image) }}" alt="Product Image" class="product-img">
                            @endif
                        </td>
                        <td>Rs {{ number_format($cartItem->product->product_price, 2) }}</td>
                        <td>
                            <form action="{{ route('addtocart.update', $cartItem->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $cartItem->product_id }}">
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="form-control" style="width: 60px; display: inline-block;">
                        </td>
                        <td>Rs {{ number_format($cartItem->subtotal, 2) }}</td>
                        <td>
                            <button type="submit" class="update-btn">Update</button>
                            </form>
                        </td>
                        <td>
                            <!-- Delete Button -->
                            <span class="delete-icon" onclick="deleteProduct({{ $cartItem->id }})">&times;</span>
                            <form id="delete-product-from-{{ $cartItem->id }}" action="{{ route('addtocart.destroy', $cartItem->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       
        <div class="text-center">
  <a href="{{ route('checkout.create', ['productId' => $cartItem->product->id]) }}" class="btn btn-primary checkout-button">Checkout</a>
</div>
    @endif
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
@include('users.footer')
</body>
</html>
