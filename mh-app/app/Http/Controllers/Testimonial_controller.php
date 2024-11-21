<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Testimonial;

class Testimonial_controller extends Controller
{
  public function index()
   {
    $test = Testimonial::orderBy('created_at', 'desc')->get();
    return view('testimonial_list',compact('test'));
   }


    public function create()
   {
    return view('testimonial_create');
   }


   public function store(Request $request)
   {
       $rules=[
           'name'=>'required|string',
           'profession'=>'nullable|string',
           'review'=>'required|string',
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
       return redirect()->route('testimonial.create')->withInput()->withErrors($validator);
     }
     /*save the data in <database>*/
     $test=new Testimonial();
     $test->id=$request->id;
     $test->name=$request->name;
     $test->profession=$request->profession;
     $test->review=$request->review;
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
     return redirect()->route('testimonial.list')->with('success','Testimonail Add successfully');
   }
   public function edit($id)
   {
    $tests=Testimonial::findorfail($id);
    return view('testimonial_edit',[
      'tests'=>$tests
    ]);
   }
   public function update($id,Request $request)
   {
    $tests=Testimonial::findorfail($id);
       $rules=[
        'name'=>'required|string',
        'profession'=>'nullable|string',
        'review'=>'required|string',
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
       return redirect()->route('testimonial.edit',$tests->id)->withInput()->withErrors($validator);
     }
     $tests->name=$request->name;
     $tests->profession=$request->profession;
     $tests->review=$request->review;
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
     return redirect()->route('testimonial.list')->with('success','Testimonial updated successfully');
   }


   public function destroy($id)
   {
    $tests=Testimonial::findOrFail($id);
    $tests->delete();
    return redirect()->route('testimonial.list')->with('success','Testimonial deleted successfully');
  }
  public function search(Request $request)
  {
      $query = $request->input('query');  
      $test = Testimonial::where('name', 'like', "%{$query}%")
                        ->orWhere('profession', 'like', "%{$query}%")
                        ->get();
      return view('testimonial_list', compact('query', 'test'));
  }

}
