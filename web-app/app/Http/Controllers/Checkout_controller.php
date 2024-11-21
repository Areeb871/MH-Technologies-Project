<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkout;
use App\Models\Addtocart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Str;

class Checkout_controller extends Controller
{
    public function create($productId)
    {
        $user_id = Auth::id();
        $addtocart = Addtocart::find($productId);
        $checkout = Addtocart::with('product')
        ->where('user_id', $user_id)
        ->get();
        $product = Product::find($productId);
        // Pass the product to the view
        return view('users.checkout', compact('product', 'checkout','addtocart'));
    }

    public function store(Request $request)
    {
     
        $user_id = Auth::id(); 
      
        $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'state' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'city' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'zip' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9\s\-\+]+$/'],
            'company' => ['required', 'string', 'max:255'],
            'payment' => 'required|in:cod',
        ]);
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));
        // Create a new checkout entry
        $checkout = new Checkout();
        $checkout->email = $request->email;
        $checkout->first_name = $request->first_name;
        $checkout->last_name = $request->last_name;
        $checkout->address = $request->address;
        $checkout->country = $request->country;
        $checkout->state = $request->state;
        $checkout->city = $request->city;
        $checkout->zip = $request->zip;
        $checkout->phone = $request->phone;
        $checkout->company = $request->company;
        $checkout->payment = $request->payment;
        $checkout->order_no = $orderNumber;
        $checkout->user_id = Auth::id(); 
        $checkout->save();
        
         // Get the items from the Addtocart table for this user
    $cartItems = Addtocart::where('user_id', $user_id)->get();

    // Check if there are any items in the cart
    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty!');
    }

    // Move data to OrderItems table
    foreach ($cartItems as $cartItem) {
        Order::create([
            'checkout_id' => $checkout->id, // Link to the checkout
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'subtotal' => $cartItem->product->product_price * $cartItem->quantity, // Calculate subtotal
            'user_id'  => $checkout->user_id,

        ]);
    }

        // Clear the cart after checkout
        Addtocart::where('user_id', $user_id)->delete();

        return redirect()->route('checkout.shipping', $checkout->id)->with('success', 'Checkout completed, your cart has been cleared.');
    }

   
    public function update(Request $request, $id)
    {
        $user_id = Auth::id(); 
        $request->validate([
            'first_name' => ['string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'last_name' => ['string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['email', 'max:255'],
            'address' => ['string', 'max:255'],
            'country' => ['string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'state' => ['string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'city' => ['string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'zip' => ['string', 'max:20', 'regex:/^[0-9]+$/'],
            'phone' => ['string', 'max:15', 'regex:/^[0-9\s\-\+]+$/'],
            'company' => ['string', 'max:255'],
            'payment' => 'in:cod',
        ]);
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));
     
        $checkout = Checkout::findOrFail($id);
        // Update the checkout entry
        $checkout->email = $request->email;
        $checkout->first_name = $request->first_name;
        $checkout->last_name = $request->last_name;
        $checkout->address = $request->address;
        $checkout->country = $request->country;
        $checkout->state = $request->state;
        $checkout->city = $request->city;
        $checkout->zip = $request->zip;
        $checkout->phone = $request->phone;
        $checkout->company = $request->company;
        $checkout->payment = $request->payment;
        $checkout->user_id = Auth::id(); 
        $checkout->order_no=$orderNumber;
        $checkout->save();
        return redirect()->route('checkout.shipping', $checkout->id)->with('success', 'Checkout updated successfully.');
    }

    public function updatestatus(Request $request, $id)
    {
        $user_id = Auth::id(); 
        $request->validate([
            'status' => 'in:process,delivered,cancel',
        ]);
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));
        $checkout = Checkout::findOrFail($id);
        $checkout->status = $request->status;
        $checkout->user_id = Auth::id(); 
        $checkout->order_no=$orderNumber;
        $checkout->save();
        return redirect()->route('checkout.orderdetail')->with('success', 'Order status updated successfully.');
    }

  
    public function shipping($id)
    {
      $checkout = Checkout::findOrFail($id);
        return view('users.checkout_payment',compact('checkout'));
    }
    public function orderdetail()
    {
    // Fetch orders for the authenticated user along with related products
    $checkout = Order::with('product')->get();
    return view('users.orderdetail', compact('checkout'));
   
     }
     public function orderdetailuser()
     {
     // Fetch orders for the authenticated user along with related products
     $checkout = Order::with('product')
                  ->where('user_id', Auth::id())  // Fetch records where user_id matches the logged-in user's id
                  ->get();
     return view('users.orderdetailuser', compact('checkout'));
      }
     public function userdashboard()
     {
     return view('users.user_dashboard');
    
      }


}