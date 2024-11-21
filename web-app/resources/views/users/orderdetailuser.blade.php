<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
 /* Styling for Update button */
.update-btn {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9em;
}

.update-btn:hover {
    background-color: #218838;
}

/* Modal styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    margin: auto;
    text-align: center;
}

.close-btn {
    float: right;
    font-size: 1.5em;
    cursor: pointer;
    color: #333;
}

h2 {
    margin-bottom: 20px;
    font-size: 1.5em;
}

label {
    font-size: 1.1em;
    display: block;
    margin-bottom: 10px;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    font-size: 1em;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.submit-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
}

.submit-btn:hover {
    background-color: #0056b3;
}

/* Media query for responsive modal */
@media (max-width: 600px) {
    .modal-content {
        width: 90%;
    }
}
</style>
<body>
<div class="cart-details">
    <h2>Your Cart</h2>
    <table class="cart-table">
        <thead>
            <tr>
            <th>Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Status</th>
                <th>Order_no</th>
                @if (Auth::check() && Auth::user()->email == 'test123@gmail.com')
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if($checkout->isEmpty())
                <tr>
                    <td colspan="6" class="empty-cart-message">Your cart is empty.</td>
                </tr>
            @else
                @foreach($checkout as $item)
                    <tr>
                    <td>{{ $item->id }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>${{ number_format($item->product->product_price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->subtotal, 2) }}</td>
                        <td>{{ ($item->checkout->status) }}</td>
                        <td>{{ ($item->checkout->order_no) }}</td>
                    </tr>

                @endforeach
            @endif
        </tbody>
    </table>
</div>

</body>
</html>
