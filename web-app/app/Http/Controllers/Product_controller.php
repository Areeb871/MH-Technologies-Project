<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class Product_controller extends Controller
{
   public function index(Request $request)
   {
    $categories = Category::all();
    $products = Product::with('category');
// Apply subcategory and category filter if a subcategory is selected
    if ($request->has('category') && !empty($request->category))
    {
        $products->where('category_id', $request->category);
    }
    if ($request->has('subcategory') && !empty($request->subcategory)) 
    {
        $products->where('subcategory_id', $request->subcategory);
    }
    // Get the filtered products
    $products = $products->get();
    // Return the view with the filtered products and categories
    return view('users.list', [
        'products' => $products,
        'categories' => $categories,
    ]);
   }
   public function create()
   {
    $subcategories=Subcategory::all();
    $categories=Category::all();
   
    return view('users.create_product',compact('categories'),compact('subcategories'));
   }
   public function store(Request $request)
   {
       $rules=[
           'product_name'=>'required|string',
           'product_model'=>'required|string',
           'product_description'=>'required|string',
           'product_price'=>'required|numeric',
           'category_id'=>'required|string',
           'subcategory_id'=>'required|string',
       ];
       if ($request->image !="")
       {
         $rules['image']='image';

       }
     $validator=Validator::make($request->all(),$rules);
     if($validator->fails())
     {
   /*route name */
       return redirect()->route('product.create')->withInput()->withErrors($validator);
     }
     /*save the data in <database>*/
     $product=new Product();
     $product->id=$request->id;
     $product->product_name=$request->product_name;
     $product->product_model=$request->product_model;
     $product->product_price=$request->product_price;
     $product->category_id=$request->category_id;
     $product->product_description=$request->product_description;
     $product->subcategory_id=$request->subcategory_id;
     $product->save();
     if ($request->image !="")
     {
     /*let store the image */
     $image=$request->image;
     /* image make unique */
     $ext=$image->getClientOriginalExtension();
     $imageName=time().'.'.$ext;
     /* save image in database */
     $product->image=$imageName;
     $product->save();

     /* save image to product directory */
     $image->move(public_path('uploads/products'),$imageName);
     }
     return redirect()->route('product.show')->with('success','product updated successfully');
   }
   public function edit($id)
   {
    $products=Product::findorfail($id);
    return view('users.edit_product',[
      'products'=>$products
    ]);
   }
   public function update($id,Request $request)
   {
    $products=Product::findorfail($id);
       $rules=[
           'product_name'=>'required|string',
           'product_model'=>'required|string',
           'product_description'=>'required|string',
           'product_price'=>'required|numeric',
       ];
       if ($request->image !="")
       {
         $rules['image']='image';

       }
     $validator=Validator::make($request->all(),$rules);
     if($validator->fails())
     {
   /*route name */
       return redirect()->route('product.edit',$products->id)->withInput()->withErrors($validator);
     }
     $products->product_name=$request->product_name;
     $products->product_model=$request->product_model;
     $products->product_price=$request->product_price;
     $products->product_description=$request->product_description;
     $products->save();
     if ($request->image !="")
       {
        /*delete the previous /old image */
     File::delete(public_path('uploads/products/'.$products->image));
     /*let store the image */
     $image=$request->image;
     /* image make unique */
     $ext=$image->getClientOriginalExtension();
     $imageName=time().'.'.$ext;
     /* save image in database */
     $products->image=$imageName;
     $products->save();
     /* save image to product directory */
     $image->move(public_path('uploads/products'),$imageName);
     }
     return redirect()->route('product.show')->with('success','product updaated successfully');
   }
   public function destroy($id)
   {
    // dd($id);
    /*find good not found other */
    $products=Product::findOrFail($id);
   /*delete  image */
    // File::delete(public_path('uploads/products/'.$products->image));
    /*delete product */
    $products->delete();

    return redirect()->route('product.show')->with('success','product deleted successfully');

  }
  
  public function search(Request $request)
  {
      $query = $request->input('query');  
      $products = Product::where('product_name', 'like', "%{$query}%")  
                          ->orWhere('product_description', 'like', "%{$query}%")  
                          ->get();
     return view('users.search_result', compact('query', 'products'));
  }
}
