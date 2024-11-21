<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addtocart;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class Add_to_cart_controller extends Controller
{
    public function create()
    {
        $user_id = Auth::id(); 
        $cart = Addtocart::with('product')
        ->where('user_id', $user_id)
        ->get();
        return view('users.addtocart_create', compact('cart'));
    }

    public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('users.login')->with('error', 'You must be logged in to add items to the cart.');
    }

    $rules = [
        'quantity' => 'required|numeric|min:1',
        'product_id' => 'required|exists:products,id',
    ];

    $request->validate($rules);

    $product = Product::find($request->product_id);
    if (!$product) {
        return redirect()->back()->withErrors(['error' => 'Product not found']);
    }
    $subtotal = $product->product_price * $request->quantity;

    $carts = new Addtocart();
    $carts->quantity = $request->quantity;
    $carts->subtotal = $subtotal;
    $carts->product_id = $request->product_id;
    $carts->user_id = Auth::id(); 
    $carts->save();

    return redirect()->route('addtocart.create', $product->id)->with('success', 'Product added to cart successfully.');
}

    public function edit($id)
    {
        $user_id = Auth::id();
        $cart = Addtocart::where('id', $id)->where('user_id', $user_id)->firstOrFail(); // Ensure the cart belongs to the user
        return view('users.addtocart_edit', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $cart = Addtocart::where('id', $id)->where('user_id', $user_id)->firstOrFail();

        $rules = [
            'quantity' => 'required|numeric|min:1',
            'product_id' => 'required|exists:products,id',
        ];

        $request->validate($rules);

        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->withErrors(['error' => 'Product not found']);
        }
        $subtotal = $product->product_price * $request->quantity;
        $cart->quantity = $request->quantity;
        $cart->subtotal = $subtotal;
        $cart->product_id = $request->product_id;
        $cart->save();

        return redirect()->route('addtocart.create',$product->id)->with('success', 'Product updated successfully.');
    }

    // Delete a cart item for the authenticated user
    public function destroy($id)
    {
        $user_id = Auth::id();
        $cart = Addtocart::where('id', $id)->where('user_id', $user_id)->firstOrFail(); // Ensure the cart item belongs to the user
        $cart->delete();
        return redirect()->route('addtocart.create',$cart->id)->with('success', 'Product removed from cart.');
    }
}
