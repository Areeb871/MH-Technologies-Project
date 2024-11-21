<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Sidebar with Nested Dropdown</title>
    <style>

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
      background-color: orange;
      color: white;
      border: 1px solid #007bff;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
      font-size: 16px;
      box-sizing: border-box; /* Include padding in width calculation */
    }

    /* Hover Effect */
    .search-button:hover {
      background-color: orange;
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
/*navbar code */
.navbar {
    background-color: orange; /* Navbar background color */
    margin-bottom: 0; /* Ensure no gap between navbar and main container */
}
    .navbar-brand,
    .navbar-nav > li > a {
      color: white !important;
      font-size: 16px;
      padding-bottom: 15px;
     
    }

    .navbar-nav > li > a:hover,
    .navbar-nav > .dropdown:hover .dropdown-toggle {
      background-color: orange;
      color: white !important;
    }

    .main-content {
    display: flex;
    align-items: flex-start; /* Align items to the top */
    width:100%;
    }
    .sidebar {
    
    width: 315px;
    background-color: #f8f9fa;
    padding: 15px;
    position: relative;
    flex-shrink: 0; /* Prevent sidebar from shrinking */
    margin:0;
}
.nav-item {
    margin: 10px 0;
    cursor: pointer;
    width: 100%;  /* Ensures full width */
    height: 50px;  /* Set height for category box */
    line-height: 50px;  /* Vertically center the text */
    padding-left: 10px; /* Add some padding */
    background-color: white; /* Set background color to white */
    color: black; /* Set text color to black */
    box-sizing: border-box; /* Includes padding in width/height calculations */
    display: flex;
    align-items: center; /* Centers text vertically */
}


.nav-item:hover {
    background-color: orange; /* Set background color to orange on hover */
    color: white; /* Set text color to white on hover */
}

/* Dropdown content - hidden initially */
.dropdown-content, 
.nested-dropdown-content {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    background-color: white; /* Ensure subcategory background color is white */
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
    min-width: 250px;  /* Ensure the width matches the main category */
}

/* Show the dropdown content on hover */
.dropdown:hover .dropdown-content,
.nested-dropdown:hover .nested-dropdown-content {
    display: block; /* Show on hover */
}

.dropdown-content .nav-item,
.nested-dropdown-content .nav-item {
    background-color: white;
    color: black;
    padding-left: 10px; /* Align text properly */
}

.dropdown-content .nav-item:hover,
.nested-dropdown-content .nav-item:hover {
    background-color: orange; /* Set background color to orange on hover */
    color: white; /* Set text color to white on hover */
}

/* Ensure the hover works smoothly */
.dropdown-content, 
.nested-dropdown-content {
    transition: all 0.3s ease;
    white-space: nowrap;
}

.sidebar .dropdown:hover .dropdown-content {
    display: block;
}

/* Prevent the hover issue by ensuring there's no gap */
.dropdown, 
.nested-dropdown {
    position: relative;
    z-index: 10;
}

/* Ensure subcategories follow the same width/height as parent */
.dropdown-content {
    min-width: 250px;
    padding: 0;
}

.nested-dropdown-content {
    min-width: 250px;
    padding: 0;
}
/* General reset for row and columns */
.row {
  margin: 0;
  padding: 0;
}

.col-lg-9 {
  padding: 0; /* Remove padding from the main content */
  margin: 0;  /* Ensure no gap between sidebar and content */
}

.image-container {
  display: flex;
  flex-wrap: wrap; /* Ensure the images will wrap on smaller screens */
  margin-top: 0; /* Remove top margin */
}

.image-container img {
  width: 100%; /* Makes the main image responsive */
  height: 400px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 10px; /* Optional: Adds space below the image */
}

.additional-images {
  display: flex;
}

.additional-images img {
  width: calc(50%); /* Adjust width for side-by-side placement, subtracting for gap */
  height: 200px;
  border-radius: 5px;
}
/* Flexbox for responsiveness */
.image-container, .additional-images {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}
/*our containers */
.inline-container {
  display: flex;
  width:100%;
  justify-content: space-around;
  margin: 20px 0;
}

.inline-container .inline-div {
  flex: 1;
  margin: 0 10px;
  padding: 20px;
  text-align: center;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.inline-container .inline-div i {
  font-size: 25px;
  text-align: center;
}
/*second section our services*/
.new-section {
  padding: 20px;
  background-color: #f8f9fa;
  text-align: center;
  border: 1px solid #ddd;
}

.new-section h2 {
  font-size: 2rem;
  margin-bottom: 10px;
}

.new-section p {
  font-size: 1rem;
  color: #6c757d;
}
.products-dropdown {
        padding-left: 20px; 
    }
    
    .nav-item {
        cursor: pointer; 

    }

    .nav-item h5:hover {
        color: #007bff; 
    }
.product-container {
    margin-left:100px;              /* Add margin to the top and bottom, center container horizontally */
    padding: 20px;  
}

.products-inline {
    display: inline-block;           
    white-space: nowrap;            
    overflow-x: auto;             
}

.product {
    display: inline-block;         
    background-color: #fff;       
    border: 1px solid #ddd;       
    border-radius: 5px;          
    padding: 15px;                  
    margin-right: 50px;             
    text-align: center;            
    width: 200px;                  
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s; 
    justify-content:center;
}

.product img {
    max-width: 100%;               
    height: auto;                  
    border-radius: 5px;            
}

.product h3 {
    font-size: 1.2em;            
    margin: 10px 0 5px;           
}

.product p {
    margin: 5px 0;                  
}

.product .price {
    font-weight: bold;              
    color: #2a9d8f;                 
}

.product:hover {
    transform: translateY(-5px);    /* Lift effect on hover */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Darker shadow on hover */
}

.banner-container {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
@media (min-width: 769px) and (max-width:990px )
{
    .inline-container .inline-div i {
    font-size: 60px; /* Slightly smaller font size for tablets */
  }
  .inline-container h2
  {
    font-size: 20px;
  }
}
/*media queries for landing top */
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
      .additional-images {
    flex-direction: column;
    align-items: center;
  }

  .additional-images img {
    width: 100%; /* Full width on smaller screens */
    margin: 5px 0; /* Adjust margin */
  }
  .inline-container .inline-div {
    flex: 1; /* Each div takes up equal space */
    margin: 0 2px; /* Adds spacing between divs */
    padding: 10px;
    background-color: #f8f9fa; /* Light background color */
    text-align: center;
    border-radius: 8px; /* Optional: Adds rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds a subtle shadow */
  }
  .inline-container h2
  {
    font-size: 20px;
  }
  .inline-container .inline-div i {
    font-size: 50px; /* Adjust font size for smaller tablets */
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
      .inline-container
  {
    flex-wrap: wrap;
    display: inline-block;
  }
  .inline-container .inline-div i {
    font-size: 30px; /* Smallest font size for mobile devices */
  }
  .additional-images img {
    width:100%;
    height: 150px; /* Adjust height for additional images */
    object-fit: cover; /* Cover the space without distorting */
    margin-bottom: 10px; /* Space between additional images */
  }
  .additional-images {
    text-align: center; /* Center the additional images on mobile */
  }
  .sidebar
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
    <form class="search-form" action="{{route('products.search')}}">
      <input type="text" placeholder="Search..." class="search-input" name="query">
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

<div class="main-content">
    <div class="sidebar">
        <h4>Shop By Department</h4>
        @foreach($catagerys as $mainCategory)
            <div class="nav-item dropdown">
                <h4>{{ $mainCategory->categories_name }}</h4>
                @if($mainCategory->subcategories->count())
                    <div class="dropdown-content">
                        @foreach($mainCategory->subcategories as $subcategory)
                            <div class="nav-item nested-dropdown" onclick="toggleProducts(this)">
                            <a href="{{route('productallsub.show',$subcategory->id)}}">
                                <h5>{{ $subcategory->subcategories_name }}</h5>
                             </a>
                                <div class="products-dropdown" style="display: none;"> <!-- Initially hidden -->
                                    @if($subcategory->products->count())
                                        <div class="dropdown-content">
                                            @foreach($subcategory->products as $product)
                                                <div class="nav-item">
                                                  <a href="{{route('productall.show',$product->id)}}">
                                                    <h5>{{ $product->product_name }}</h5>
                                                   </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No products available for this subcategory.</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif             
            </div>
        @endforeach
    </div>
    <div class="col-lg-9">
   <div id="imageCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#imageCarousel" data-slide-to="1"></li>
    <li data-target="#imageCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/image6.jpg" class="img-fluid" alt="Image 1"style="height:400px;width:1200px;" >
    </div>

    <div class="item">
      <img src="images/image7.jpg" class="img-fluid" alt="Image 2"style="height:400px;width:1200px;" >
    </div>

    <div class="item">
      <img src="images/image8.jpg" class="img-fluid" alt="Image 3"style="height:400px;width:1200px;" >
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#imageCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#imageCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <div class="additional-images">
      <img src="images/image2.jpg" class="rounded float-left" alt="Image 2">
      <img src="images/image3.jpg" class="rounded float-right" alt="Image 3">
    </div>
  </div>
</div>
</div>
<div class="new-section">
    <h2>Our Services</h2>
    <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
  </div>
  <div class="inline-container">
    <div class="inline-div">
    <i class="fa-solid fa-truck-fast" style="color: #FFD43B;"></i>
      <h2>Fast Operation</h2>
      <p>Cobuild impresses you with fully responsiveness and highly customization
      </p> 
    </div>
    <div class="inline-div">
    <i class="fa-solid fa-cloud" style="color: #FFD43B;"></i>
      <h2>Renovation</h2>
      <p>Cobuild impresses you with fully responsiveness and highly customization.</p>
    </div>
    <div class="inline-div">
    <i class="fa-solid fa-dungeon" style="color: #FFD43B;"></i>
      <h2>Consultation</h2>
      <p>Cobuild impresses you with fully responsiveness and highly customization.</p>
    </div>
    <div class="inline-div">
    <i class="fa-solid fa-building" style="color: #FFD43B;"></i>
      <h2>Architecture</h2>
      <p>Cobuild impresses you with fully responsiveness and highly customization.</p>
    </div>
  </div>
  @foreach($subcatagerys as $subcategory)
    <h2>{{ $subcategory->subcategories_name }}</h2>
    <div class="product-container">
        @if($subcategory->products->isEmpty())
            <p>No products available in this subcategory.</p>
        @else
            @foreach($subcategory->products as $product)
                <div class="product">
                    @if($product->image != '')
                        <img src="{{ asset('uploads/products/'.$product->image) }}" alt="Product Image" height="200px" width="300px">
                    @endif
                    <h3>{{ $product->product_name }}</h3>
                    <p>{{ $product->product_description }}</p>
                    <p class="price">${{ $product->product_price }}</p>
                    <a href="{{route('productall.show',$product->id)}}"><button type="button" class="btn btn-warning">Add to Cart</button></a>
                 </div>
            @endforeach
        @endif
    </div>
@endforeach

<div class="banner-container">
    <img src="images/picture2.png" alt="Laptop Parts Banner" class="banner-img" height="300px"width="100%">
</div>
</body>
</html>
<script>
    function toggleProducts(element) {
        // Get all product dropdowns
        const allProductDropdowns = document.querySelectorAll('.products-dropdown');

        // Hide all dropdowns
        allProductDropdowns.forEach(dropdown => {
            dropdown.style.display = 'none';
        });

        // Show the clicked subcategory's products
        const productDropdown = element.querySelector('.products-dropdown');
        if (productDropdown) {
            productDropdown.style.display = productDropdown.style.display === 'none' ? 'block' : 'none';
        }
      } 
</script>
