<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
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
    .progress-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .progress-bar {
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
</style>
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
<div class="progress-container">
  <div class="progress-bar">
    <div class="step inactive">
      <div class="step-icon">
        <i class="fas fa-check"></i>
      </div>
      <div class="step-title">Shipping</div>
    </div>
    <div class="step active">
      <div class="step-icon"> <i class="fas fa-check"></i></div>
      <div class="step-title">Review & Payments</div>
    </div>
</div>

</div>
<div class="thank-you-container">
  <h2>Thank You for Your Order!</h2>
  <p>Your order has been placed successfully.</p>
  
  <h3>Shipping Address</h3>
  <div class="shipping-address">
  <div class="order-details">
        <div class="order-item">
        <p><strong>Order_No:</strong> {{ $checkout->order_no ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $checkout->email ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $checkout->address ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $checkout->phone ?? 'N/A' }}</p>
            <p><strong>Order:</strong> {{ $checkout->status ?? 'N/A' }}</p>
        </div>
</div>
  <div class="continue-shopping">
  <a href="{{ route('landingpage') }}" class="btn btn-warning">Continue Shopping</a>
  </div>
</div>
</div>
</body>
</html>