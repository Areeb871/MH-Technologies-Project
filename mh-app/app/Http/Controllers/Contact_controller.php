<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Contact;
use App\Models\Notification;

class Contact_controller extends Controller
{

    public function create()
    {
      return redirect()->route('service.show');
    }
    public function store(Request $request)
    {
        $rules=[
            'first_name'=>'required|string',
            'email'=>'required|string',
            'subject'=>'nullable|string',
            'message'=>'required|string',
        ];
      $validator=Validator::make($request->all(),$rules);
      if($validator->fails())
      {
        return redirect()->route('form.create')->withInput()->withErrors($validator);
      }

      /*save the data in <database>*/
      $contact=new Contact();
      $contact->id=$request->id;
      $contact->first_name=$request->first_name;
      $contact->email=$request->email;
      $contact->subject=$request->subject;
      $contact->message=$request->message;
      $contact->save();

      Notification::create([
        'title' => 'Message',
        'message' => 'You have new notification ' . $contact->first_name,
    ]);
      return redirect()->route('form.create')->with('success','Add successfully');
    }
    public function destroy($id)
    {
     $contact=Contact::findOrFail($id);
     $contact->delete();
     return redirect()->route('form.list')->with('success','deleted successfully');
   }
   public function detailofallproduct()
   {
    $contact=Contact::All();
    return view('showalldata',compact('contact'));
   }
   public function search(Request $request)
   {
       $query = $request->input('query');  
       $contact = Contact::where('email', 'like', "%{$query}%")
                         ->orWhere('first_name', 'like', "%{$query}%")
                         ->get();
       return view('showalldata', compact('query', 'contact'));
   }


}
