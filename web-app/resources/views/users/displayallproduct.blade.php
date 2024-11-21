
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Products</title>
    <style>
        /* Flexbox container to align products in a row */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content:center;
        }

        /* Styling each product card */
        .product {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styling for product image */
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Product heading and description */
        .product h2 {
            font-size: 1.5rem;
            color: #333;
            margin: 10px 0;
        }

        .product p {
            font-size: 1rem;
            color: #666;
            margin: 5px 0;
        }

        /* Product price */
        .product .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>
<h1>Products in {{ $subcategory->subcategories_name }}</h1>
<div class="product-container">
    @foreach($products as $product)
        <div class="product">
        @if($product->image != '')
                <img src="{{ asset('uploads/products/'.$product->image) }}" alt="Product Image" height="200px" width="300px">
            @endif
            <h2>{{ $product->product_name }}</h2>
            <p>{{ $product->product_description }}</p>
            <p class="price">${{ $product->product_price }}</p>
            <a href="{{route('productall.show',$product->id)}}"><button type="button" class="btn btn-warning">Add to Cart</button></a>
        </div>
    @endforeach
</div>
</body>
</html>
