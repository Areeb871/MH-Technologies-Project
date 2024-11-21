<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Checkout Progress</title>
  
  <style>
    /* General Styling */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      text-align: center;
      margin-top: 50px;
    }

    /* Logo Styling */
    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .logo-container img {
      max-width: 100px;
      margin-right: 15px;
    }

    .brand-text {
      text-align: left;
    }

    .brand-text h1 {
      margin: 0;
      font-size: 30px;
      color: black;
    }

    .brand-text p {
      margin: 0;
      font-size: 14px;
      color: gray;
    }

    /* Progress Bar Styling */
    .progress-container1 {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .progress-bar1 {
      display: flex;
      align-items: center;
      width: 50%;
    }

    .step {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1;
      position: relative;
    }

    .step:before {
      content: '';
      position: absolute;
      width: 100%;
      height: 5px;
      background-color: #e0e0e0;
      top: 50%;
      left: -50%;
      z-index: -1;
    }

    .step:first-child:before {
      display: none;
    }

    .step-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 18px;
      border: 2px solid #e0e0e0;
      background-color: white;
      color: #e0e0e0;
    }

    .step.active .step-icon {
      border-color: #ffa500;
      background-color: #ffa500;
      color: white;
    }

    .step-title {
      margin-top: 10px;
      font-size: 14px;
      color: #333;
    }

    .step.inactive .step-title {
      color: #e0e0e0;
    }

    .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        .form-box {
            width: 65%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-summary {
            width: 30%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-box h2, .order-summary h3 {
            margin-bottom: 20px;
        }

        .form-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-box input, .form-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-box input[type="text"], .form-box input[type="email"], .form-box select {
            font-size: 14px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-row div {
            width: 48%;
        }

 .order-summary {
    border: 1px solid #ddd; /* Border around the summary */
    padding: 20px; /* Padding inside the summary */
    border-radius: 5px; /* Rounded corners */
    background-color: #f9f9f9; /* Light background color */
}

.order-item {
    display: flex; /* Flexbox for alignment */
    margin-bottom: 15px; /* Spacing between items */
    padding: 10px; /* Padding around each item */
    border-bottom: 1px solid #ccc; /* Bottom border for separation */
}

.product-img {
    width: 80px; /* Set image width */
    height: auto; /* Maintain aspect ratio */
    margin-right: 15px; /* Space between image and text */
}

.product-details {
    flex-grow: 1; /* Allow details to take remaining space */
}

.product-details p {
    margin: 5px 0; /* Spacing for paragraphs */
}
button[type="submit"] {
    background-color: #ff6600; /* Orange color */
    color: white; /* Text color */
    border: none; /* Remove default border */
    padding: 10px 20px; /* Add padding */
    font-size: 16px; /* Increase font size */
    font-weight: bold; /* Make text bold */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition */
}

button[type="submit"]:hover {
    background-color: #e65c00; /* Darker orange on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

button[type="submit"]:active {
    transform: translateY(0); /* No lift on click */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Reduced shadow on click */
}


.payment-method-container {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #e6e6e6;
    border-radius: 10px;
}

.payment-method-container h3 {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 15px;
    text-align: center;
}

.payment-option {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.payment-option input[type="checkbox"] {
    margin-right: 10px;
    width: 18px;
    height: 18px;
    cursor: pointer;
}

.payment-option label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.place-order-btn {
    width: 100%;
    background-color: #ff6600; /* Orange color */
    color: white;
    padding: 12px;
    border: none;
    font-size: 18px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-align: center;
}

.place-order-btn:hover {
    background-color: #e65c00;
    transform: translateY(-2px);
}

.place-order-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
.hidden-option {
    display: none; /* This will hide the options from the dropdown */
}
  </style>
</head>
<body>
<!-- Logo and Brand -->
<div class="logo-container">
  <img src="images/picture1.png" alt="TBS Logo">
  <div class="brand-text">
    <h1>The Brand Store</h1>
    <p>By Trade Links</p>
  </div>
</div>
<!-- Progress Bar -->
<div class="progress-container1">
  <div class="progress-bar1">
    <div class="step active">
      <div class="step-icon">
      ✓
      </div>
      <div class="step-title">Shipping</div>
    </div>
    <div class="step active">
      <div class="step-icon">✓</div>
      <div class="step-title">Review & Payments</div>
    </div>
  </div>
</div>
<div class="container">
    <div class="form-box">
        <h2>Checkout Form</h2>
        <form id="orderForm" action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

            <div class="form-row">
                <div>
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror">
                </div>
                <div>
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name"class="form-control @error('last_name') is-invalid @enderror">
                </div>
            </div>

            <label for="address">Street Address</label>
            <input type="text" id="address" name="address"class="form-control @error('address') is-invalid @enderror">
           
            <div class="form-row">
                <div>
                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="Pakistan">Pakistan</option>
                    </select>
                </div>
                <div>
                    <label for="state">State/Province</label>
                    <input type="text" id="state" name="state"class="form-control @error('state') is-invalid @enderror">
                   
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="city">City</label>
                    <input type="text" id="city" name="city"class="form-control @error('city') is-invalid @enderror">
                   
                </div>
                <div>
                    <label for="zip">Zip/Postal Code</label>
                    <input type="text" id="zip" name="zip"class="form-control @error('zip') is-invalid @enderror">
                    @error('zip')
                   <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone"class="form-control @error('phone') is-invalid @enderror">
                </div>
                <div>
                    <label for="company">Company</label>
                    <input type="text" id="company" name="company"class="form-control @error('company') is-invalid @enderror">
                </div>
             <div>
  

          </div>
            
        
    </div>
</div>
    <div class="order-summary">
    <h3>Order Summary</h3>
    @foreach($checkout as $item)
        <div class="order-item">
            @if($item->product->image != '')
                <img src="{{ asset('uploads/products/' . $item->product->image) }}" alt="Product Image" class="product-img">
            @endif
            <div class="product-details">
                <p><strong>Product Name:</strong> {{ $item->product->product_name }}</p>
                <p><strong>Product Description:</strong> {{ $item->product->product_description }}</p>
                <p><strong>Price:</strong> Rs {{ number_format($item->subtotal, 2) }}</p>
            </div>
        </div>
    @endforeach

    
  <div class="payment-method-container">
    <h3>Payment Method</h3>

    <div class="payment-option">
        <input type="checkbox" id="cod" name="payment" value="cod">
        <label for="cashOnDelivery">Cash on Delivery</label>
    </div>
    <button type="submit" class="place-order-btn">Place Order</button>
</div>
</form>
</div>
</div>

</body>
</html>

<script>
    // Step 1: Add an event listener to the form
    document.getElementById('orderForm').addEventListener('submit', function(event) {
        
        // Step 2: Check if the "Cash on Delivery" checkbox is selected
        var codChecked = document.getElementById('cod').checked;

        // Step 3: If "Cash on Delivery" is not selected, prevent the form from submitting
        if (!codChecked) {
            event.preventDefault();  // Stop the form from submitting

            // Step 4: Show an alert message to the user, asking them to select the payment method
            alert("Please select 'Cash on Delivery' to proceed.");
        }
    });
</script>
