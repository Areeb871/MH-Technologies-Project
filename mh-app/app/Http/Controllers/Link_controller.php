<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Link;
class Link_controller extends Controller
{
    public function index()
    {
     $link=Link::all();
     return view('link_list', compact('link'));
    }
     public function create()
    {
     return view('link_create');
    }
 
    public function store(Request $request)
    {
        $rules=[
         'xlink' => 'nullable|string',
         'flink' => 'nullable|string',
         'linkd' => 'nullable|string',
         'ilink' => 'nullable|string',
         'sklink' => 'nullable|string',
        ];
      $validator=Validator::make($request->all(),$rules);
      if($validator->fails())
      {
        return redirect()->route('link.create')->withInput()->withErrors($validator);
      }
      /*save the data in <database>*/
      $link=new Link();
      $link->xlink=$request->input('xlink', null); 
      $link->ilink=$request->input('ilink', null); 
      $link->flink=$request->input('flink', null); 
      $link->linkd=$request->input('linkd', null); 
      $link->sklink=$request->input('sklink', null); 
      $link->save();
      return redirect()->route('link.list')->with('success','Link Add successfully');
    }
    public function edit($id)
    {
     $links=Link::findorfail($id);
     return view('link_edit',[
       'links'=>$links
     ]);
    }
    public function update($id,Request $request)
    {
     $links=Link::findorfail($id);
        $rules=[
            'xlink' => 'nullable|string',
            'flink' => 'nullable|string',
            'linkd' => 'nullable|string',
            'ilink' => 'nullable|string',
            'sklink' => 'nullable|string',
        ];
      $validator=Validator::make($request->all(),$rules);
      if($validator->fails())
      {
    /*route name */
        return redirect()->route('link.edit',$links->id)->withInput()->withErrors($validator);
      }
      $links->xlink=$request->xlink; 
      $links->ilink=$request->ilink;
      $links->flink=$request->flink;
      $links->linkd=$request->linkd;
      $links->sklink=$request->sklink;
      $links->save();
      return redirect()->route('link.list')->with('success',' Link updated successfully');
    }
    public function destroy($id)
    {
     $links=Link::findOrFail($id);
     $links->delete();
     return redirect()->route('link.list')->with('success','Link deleted successfully');
   }
   /*
   public function search(Request $request)
   {
       $query = $request->input('query');  
       $test = Team::where('name', 'like', "%{$query}%")
                         ->orWhere('title', 'like', "%{$query}%")
                         ->get();
       return view('team_list', compact('query', 'test'));
   }
       */
}
