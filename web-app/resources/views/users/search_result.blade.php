<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        h4 {
            font-weight: 500;
            color: #333;
            margin-bottom: 30px;
        }
        .product-card {
            transition: transform 0.2s ease-in-out;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            background-color: #fff;
            padding: 15px;
        }
        .product-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }
        .product-image {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }
        .product-details h5 {
            color: #007bff;
            font-weight: 500;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .product-details p {
            color: #666;
            margin-bottom: 5px;
        }
        .product-price {
            font-weight: 700;
            color: #28a745;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Display the search term and number of products -->
    <div class="row">
        <div class="col-12 text-center">
            <h4>{{ $products->count() }} Products Found for "<span class="text-primary">{{ $query }}</span>"</h4>
        </div>
    </div>

    <!-- Search results in grid format -->
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="product-card">
                    <!-- Product Image -->
                    @if($product->image != '')
                        <img src="{{ asset('uploads/products/'.$product->image) }}" alt="Product Image" class="product-image">
                    @else
                        <img src="{{ asset('default-image.png') }}" alt="Default Image" class="product-image">
                    @endif

                    <!-- Product details -->
                    <div class="product-details">
                        <h5>{{ $product->product_name }}</h5>
                        <p>SKU: {{ $product->product_model }}</p>
                        <p class="product-price">Rs {{ number_format($product->product_price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
