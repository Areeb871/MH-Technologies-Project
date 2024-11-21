<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Aboutus;
use App\Models\Testimonial;
use App\Models\Portfolio;
use App\Models\Team;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Link;
use App\Models\Banner_Video;
class Aboutus_controller extends Controller
{
    public function index()
   {
    $services=Aboutus::all();
    return view('service_list',compact('services'));
   }
    public function create()
   {
    return view('service_create');
   }
   public function store(Request $request)
   {
       $rules=[
           'title'=>'required|string',
           'description'=>'required|string',
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
       return redirect()->route('service.create')->withInput()->withErrors($validator);
     }
     /*save the data in <database>*/
     $service=new Aboutus();
     $service->id=$request->id;
     $service->title=$request->title;
     $service->description=$request->description;
     $service->save();
     if ($request->image !="")
     {
     $image=$request->image;
     $ext=$image->getClientOriginalExtension();
     $imageName=time().'.'.$ext;
     $service->image=$imageName;
     $service->save();
     $image->move(public_path('uploads/products'),$imageName);
     }
     return redirect()->route('service.list')->with('success','Service Add successfully');
   }
   public function edit($id)
   {
    $services=Aboutus::findorfail($id);
    return view('edit_services',[
      'services'=>$services
    ]);
   }
   public function update($id,Request $request)
   {
    $services=Aboutus::findorfail($id);
       $rules=[
        'title'=>'required|string',
        'description'=>'required|string',
       ];
       if ($request->image !="")
       {
        $rules['image'] = 'image|max:15360'; 
       }
       $customMessages = [
        'image.max' => 'The uploaded image size must not exceed 15 MB.', // Custom message for max size
        'image.required' => 'Please upload an image.', // Custom message for required image
    ];
     $validator=Validator::make($request->all(),$rules,$customMessages);
     if($validator->fails())
     {
       return redirect()->route('service.edit',$services->id)->withInput()->withErrors($validator);
     }
     $services->title=$request->title;
     $services->description=$request->description;
     $services->save();
     if ($request->image !="")
       {
     File::delete(public_path('uploads/products/'.$services->image));

     $image=$request->image;
     
     $ext=$image->getClientOriginalExtension();
     $imageName=time().'.'.$ext;
     $services->image=$imageName;
     $services->save();
     $image->move(public_path('uploads/products'),$imageName);
     }
     return redirect()->route('service.list')->with('success','Service updated successfully');
   }
   public function destroy($id)
   {
    $services=Aboutus::findOrFail($id);
    $services->delete();

    return redirect()->route('service.list')->with('success','Service deleted successfully');

  }
  public function show(Request $request)
{
    $services = Aboutus::all();
    $tests = Testimonial::orderBy('created_at', 'desc')->get();
    $videos = Banner_Video::all(); 
    $link = Link::first();
    $filter = $request->get('filter', 'all');

    // Fetch portfolios based on the filter
    if ($filter === 'all') {
        $test = Portfolio::all();
    } elseif ($filter === 'development') {
        $test = Portfolio::where('type', 'development')->get();
    } elseif ($filter === 'design') {
        $test = Portfolio::where('type', 'design')->get();
    }

    return view('index', compact('services', 'tests', 'test', 'link', 'videos'));
}

  public function dashboard()
    {
      $notifications = Notification::orderBy('created_at', 'desc')->paginate(2);
        return view('dashboard',compact('notifications'));
    } 
    public function search(Request $request)
    {
        $query = $request->input('query');  
        $services = Aboutus::where('title', 'like', "%{$query}%")
                          ->get();
        return view('service_list', compact('query', 'services'));
    }
}
