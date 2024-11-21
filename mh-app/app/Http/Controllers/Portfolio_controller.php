<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Portfolio;
use App\Models\Link;

class Portfolio_controller extends Controller
{
  public function show(Request $request)
  {
      $type = $request->query('type');
      $category = $request->query('category');
      $query = Portfolio::query();
  
      if ($type) {
          $query->where('type', $type);
      }
      if ($category) {
          $query->where('category', $category);
      }
  
      // Fetch all portfolios ordered by creation date within their categories
      $portfolios = $query->orderBy('created_at', 'desc')->get();
      $test = $portfolios->groupBy('category');
      $link = Link::first();
      return view('portfolio', compact('test', 'link'));
  }
  
public function show1(Request $request)
{
    $type = $request->query('type', 'design'); // Default to 'design' if no type is passed
    $query = Portfolio::query();

    // Filter portfolios by type = 'design'
    $query->where('type', $type);

    // Fetch portfolios based on type (without grouping by category)
    $test = $query->get();
    $link=Link::First();

    return view('designpage', compact('test'),compact('link'));
}


  public function index(Request $request)
  {
      
      $filter = $request->query('type');
      if ($filter) {
          $test = Portfolio::where('type', $filter)->get();
      } else {
          $test = Portfolio::all();
      }
      return view('portfolio_list', compact('test'));
  }
    public function create()
   {
    return view('portfolio_create');
   }

   public function store(Request $request)
   {
       $rules=[
        'type' => 'in:development,design',
        'title'=>'required|string',
        'description'=>'nullable|string',
        'link'=>'nullable|string|max:500',
        'category'=>'in:Website & Software,Mobile Applications',
       ];
       if ($request->image !="")
       {
        $rules['image'] = 'image|max:15360'; // max:2048 is 2MB
       }
       $customMessages = [
        'image.max' => 'The uploaded image size must not exceed 15 MB.', // Custom message for max size
        'image.required' => 'Please upload an image.', // Custom message for required image
       ];
     $validator=Validator::make($request->all(),$rules,$customMessages);
     if($validator->fails())
     {
       return redirect()->route('portfolio.create')->withInput()->withErrors($validator);
     }
     /*save the data in <database>*/
     $test=new Portfolio();
     $test->id=$request->id;
     $test->title=$request->title;
     $test->description=$request->description;
     $test->type=$request->type;
     $test->link=$request->link;
     $test->category=$request->category;
     $test->save();
     if ($request->image !="")
     {
     $image=$request->image;
     $ext=$image->getClientOriginalExtension();
     $imageName=time().'.'.$ext;
     $test->image=$imageName;
     $test->save();
     $image->move(public_path('uploads/products'),$imageName);
     }
     return redirect()->route('portfolio.list')->with('success',' Portfolio Add successfully');
   }
   public function edit($id)
   {
    $tests=Portfolio::findorfail($id);
    return view('portfolio_edit',[
      'tests'=>$tests
    ]);
   }
   public function update($id,Request $request)
   {
    $tests=Portfolio::findorfail($id);
       $rules=[
        'type' => 'in:development,design',
        'title'=>'required|string',
        'description'=>'nullable|string',
        'link'=>'nullable|string|max:500',
        'category'=>'in:Website & Software,Mobile Applications',

       ];
       if ($request->image !="")
       {
        $rules['image'] = 'image|max:15360'; // max:2048 is 2MB
       }
       $customMessages = [
        'image.max' => 'The uploaded image size must not exceed 15 MB.', // Custom message for max size
        'image.required' => 'Please upload an image.', // Custom message for required image
       ];
     $validator=Validator::make($request->all(),$rules,$customMessages);
     if($validator->fails())
     {
   /*route name */
       return redirect()->route('portfolio.edit',$tests->id)->withInput()->withErrors($validator);
     }
     $tests->title=$request->title;
     $tests->description=$request->description;
     $tests->type=$request->type;
     $tests->link=$request->link;
     $tests->category=$request->category;
     $tests->save();
     if ($request->image !="")
       {
     File::delete(public_path('uploads/products/'.$tests->image));
     $image=$request->image;
     $ext=$image->getClientOriginalExtension();
     $imageName=time().'.'.$ext;
     $tests->image=$imageName;
     $tests->save();
     $image->move(public_path('uploads/products'),$imageName);
     }
     return redirect()->route('portfolio.list')->with('success','Portfolio updated successfully');
   }
   public function destroy($id)
   {
    $tests=Portfolio::findOrFail($id);
    $tests->delete();
    return redirect()->route('portfolio.list')->with('success','Portfolio deleted successfully');
  }
  public function search(Request $request)
  {
      $query = $request->input('query');  
      $test = Portfolio::where('title', 'like', "%{$query}%")
                        ->orWhere('type', 'like', "%{$query}%")
                        ->get();
      return view('portfolio_list', compact('query', 'test'));
  }
}
