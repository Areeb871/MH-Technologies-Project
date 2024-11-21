<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@foreach($checkouts as $checkout)
            <div class="checkout-item">
                <h3>Order #{{ $checkout->id }}</h3>
                <form action="{{ route('checkout.update', $checkout->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Order Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="order_placed" {{ $checkout->status == 'order_placed' ? 'selected' : '' }}>Order Placed</option>
                            <option value="process" {{ $checkout->status == 'process' ? 'selected' : '' }}>Process</option>
                            <option value="cancel" {{ $checkout->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        @endforeach

</body>
</html>