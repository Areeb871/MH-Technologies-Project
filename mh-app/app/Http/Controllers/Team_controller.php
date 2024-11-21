<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Team;
use App\Models\Link;

class Team_controller extends Controller
{
    public function show(Request $request)
    {
      $team=Team::all();
      $category = $request->query('category');
      $query = Team::query();
      if ($category) {
          $query->where('category', $category);
      }
      $test = $query->get()->groupBy('category');
      $link=Link::First();
      return view('enchanters',compact('test'),compact('link'));
    }
    public function index()
   {
    $test=Team::all();
    return view('team_list', compact('test'));
   }
    public function create()
   {
    return view('team_create');
   }
   public function store(Request $request)
   {
       $rules=[
        'title'=>'required|string',
        'name'=>'required|string',
        'xlink' => 'nullable|string',
        'flink' => 'nullable|string',
        'linkd' => 'nullable|string',
        'ilink' => 'nullable|string',
        'category'=>'in:Wizards,Magicians & Sorcerers',
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
       return redirect()->route('team.create')->withInput()->withErrors($validator);
     }
     /*save the data in <database>*/
     $test=new Team();
     $test->id=$request->id;
     $test->title=$request->title;
     $test->name=$request->name;
     $test->xlink=$request->input('xlink', null); 
     $test->ilink=$request->input('ilink', null); 
     $test->flink=$request->input('flink', null); 
     $test->linkd=$request->input('linkd', null); 
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
     return redirect()->route('team.list')->with('success','Member Add successfully');
   }
   public function edit($id)
   {
    $tests=Team::findorfail($id);
    return view('team_edit',[
      'tests'=>$tests
    ]);
   }
   public function update($id,Request $request)
   {
    $tests=Team::findorfail($id);
       $rules=[
        'title'=>'required|string',
        'name'=>'required|string',
        'category'=>'in:Wizards,Magicians & Sorcerers',
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
       return redirect()->route('team.edit',$tests->id)->withInput()->withErrors($validator);
     }
     $tests->title=$request->title;
     $tests->name=$request->name;
     $tests->xlink=$request->xlink; 
     $tests->ilink=$request->ilink;
     $tests->flink=$request->flink;
     $tests->linkd=$request->linkd;
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
     return redirect()->route('team.list')->with('success',' Member updated successfully');
   }
   public function destroy($id)
   {
    $tests=Team::findOrFail($id);
    $tests->delete();
    return redirect()->route('team.list')->with('success','Member deleted successfully');
  }
  public function search(Request $request)
  {
      $query = $request->input('query');  
      $test = Team::where('name', 'like', "%{$query}%")
                        ->orWhere('title', 'like', "%{$query}%")
                        ->get();
      return view('team_list', compact('query', 'test'));
  }
}
