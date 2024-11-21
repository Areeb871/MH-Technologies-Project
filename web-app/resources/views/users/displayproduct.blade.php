<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <style>
/* Flexbox wrapper to align product details and info box inline */
.product-page {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    padding: 20px;
    align-items: flex-start; /* Aligns the top of the product and info-box */
}

/* Product Container */
.product-container {
    display: flex;
    flex-direction: column;
    flex: 3; /* Allows the product container to take up more space */
}

.product-header {
    margin-bottom: 20px;
}

.product-header h1 {
    font-size: 24px;
    font-weight: bold;
}

.product-details {
    display: flex;
    gap: 20px;
}

.product-image img {
    max-width: 400px;
    max-height: 300px;
    object-fit: contain;
    border: 1px solid #ddd;
    padding: 10px;
    background: #f7f7f7;
}

.product-info {
    flex: 1;
}

.product-info h2 {
    font-size: 32px;
    color: #333;
}

.add-to-cart-btn {
    background-color: orange; 
    color: white; 
    border: none; 
    padding: 10px 40px; 
    font-size: 16px;
    cursor: pointer; 
    border-radius: 5px; 
    transition: background-color 0.3s; 
    margin-top: 10px;
}

.add-to-cart-btn:hover {
    background-color: #ff8c00;
}

input[type="number"] {
    width: 80px;
}

.product-info p {
    margin: 10px 0;
}

.product-info a {
    color: #00a2ff;
    text-decoration: none;
}

.product-info a:hover {
    text-decoration: underline;
}

form {
    margin-top: 10px;
}

/* Info Box */
.info-box {
    display: flex;
    flex-direction: column;
    gap: 15px;
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    max-width: 250px;
    flex: 1; /* The info box takes up less space */
    margin-top:80px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.info-item i {
    font-size: 24px;
    color: #ffcc00; /* Icon color */
}

.info-text {
    display: flex;
    flex-direction: column;
}

.info-text strong {
    font-size: 16px;
    color: #333;
}

.info-text p {
    font-size: 14px;
    color: #777;
}
@media (max-width: 950px)
{
    .add-to-cart-btn {
        width: 100%;  /* Make the button full width on mobile */
        padding: 5px 0; /* Adjust padding */
    }
    .info-box {
     flex-wrap:wrap;
    }

}

@media (max-width: 850px) {
    .product-details {
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    .product-header h1 {
        font-size: 20px;
        text-align: center;
    }

    .product-header p {
        text-align: center;
    }

    .product-info h2 {
        font-size: 24px;
    }

    .product-image img {
        max-width: 100%;
        height: auto;
    }
    form {
        margin-top: 10px;

}
    .add-to-cart-btn {
        width: 100%;  /* Make the button full width on mobile */
        padding: 10px 0; /* Adjust padding */
    
    }
    .info-box {
        display:none;
    }

}

    </style>
</head>
<body>
@include('users.navbar');
    <div class="product-page">
        <div class="product-container">
            <div class="product-header">
                <h1>{{ $products->product_name }} - {{ $products->product_model }} - {{ $products->product_description }}</h1>
                <p>SKU: {{ $products->product_model }}</p>
            </div>
            <div class="product-details">
                <div class="product-image">
                    @if($products->image != '')
                        <img src="{{ asset('uploads/products/' . $products->image) }}" alt="{{ $products->product_name }}" />
                    @else
                        <img src="{{ asset('default-image.png') }}" alt="Default Product Image" />
                    @endif
                </div>
                <div class="product-info">
                    <h2 id="product-price">Rs {{ $products->product_price }}</h2>
                    <p>{{ (bool)$products->availability ? 'In Stock' : 'Out of Stock' }}</p>
                    <p>{{ $products->product_description }}</p>
                    <p>Categories: 
                        <a href="#">{{ $products->subcategory->subcategories_name }}</a>, 
                        <a href="#">{{ $products->category->categories_name }}</a>
                    </p>

                    <!-- Add to Cart Form -->
                    <form action="{{ route('addtocart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <input type="hidden" id="price" value="{{ $products->product_price }}">

                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control mb-2" onchange="updateSubtotal()">
                        <!-- Add to Cart button -->
                        <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <div class="info-item">
                <i class="fa-solid fa-rocket"></i>
                <div class="info-text">
                    <strong>Free Delivery</strong>
                    <p>Free Shipping Nationwide</p>
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-undo"></i>
                <div class="info-text">
                    <strong>15 Days Return</strong>
                    <p>If goods have problems</p>
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-credit-card"></i>
                <div class="info-text">
                    <strong>Secure Payment</strong>
                    <p>100% secure payment</p>
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-comments"></i>
                <div class="info-text">
                    <strong>24/7 Support</strong>
                    <p>LIVE Chat/Whatsapp</p>
                </div>
            </div>
        </div>
    </div>

    @include('users.footer')
</body>
</html>
