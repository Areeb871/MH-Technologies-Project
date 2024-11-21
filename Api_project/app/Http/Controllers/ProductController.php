<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    // Fetch all products
    public function index()
    {
        $products = Product::get(); // Get all products

        if ($products->isEmpty()) {
            // Return response if no products found
            return response()->json(['message' => 'No records available'], 404);
        }

        // Return a collection of products wrapped in ProductResource
        return ProductResource::collection($products);
    }

    // Store a new product
    public function store(Request $request)
{
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric', // Make sure price is numeric
    ]);

    if ($request->hasFile('image')) {
        $validator->addRules([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,|max:2048' // Validate image type and size
        ]);
    }

    // If validation fails, return error response with messages
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
            'status' => 'error'
        ], 422);
    }

    // Create a new product instance
    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    // If an image is uploaded, process it
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName); // Move image to public folder

        // Save the image path in the product record
        $product->image = 'uploads/products/' . $imageName; // Store image path in the database
    }

    // Save the product with the image path
    $product->save();

    // Return the newly created product with success message
    return response()->json([
        'message' => 'Product created successfully',
        'data' => new ProductResource($product)
    ], 201); // 201 status code for successful creation
}

    // Show a single product by ID
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found',
                'status' => 'error'
            ], 404); 
        } else {
            return new ProductResource($product);
        }
    }
    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
    ]);

    if ($request->hasFile('image')) {
        $validator->addRules([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);
    }

    // If validation fails, return error response with messages
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
            'status' => 'error'
        ], 422);
    }

    // Find the existing product by ID
    $product = Product::find($id);
    if (!$product) {
        return response()->json([
            'message' => 'Product not found',
            'status' => 'error'
        ], 404); // Return 404 if product is not found
    }

    // Update product fields
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;

    // If an image is uploaded, process it
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image)); // Delete the old image from the server
        }

        // Process the new image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products'), $imageName); // Move image to the public folder

        // Save the new image path in the product record
        $product->image = 'uploads/products/' . $imageName;
    }

    // Save the updated product
    $product->save();

    // Return the updated product with success message
    return response()->json([
        'message' => 'Product updated successfully',
        'data' => new ProductResource($product)
    ], 200); // 200 status code for successful update
}

    public function destroy($id)
    {
        $product = Product::find($id);

        // If product is not found, return a 404 error response
        if (!$product) {
            return response()->json([
                'message' => 'Product already deleted',
                'status' => 'error'
            ], 404); // 404 Not Found
        } else {
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully',
            ], 200); // 200 OK
        }
    }
}
