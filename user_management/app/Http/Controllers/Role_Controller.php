<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class Role_Controller extends Controller
{
    public function index()
    {
        $link=Role::All();
        return view('role_list',compact('link'));
    }
    public function create()
    {
        return view('role_create');
    }
    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                // other fields and validation rules...
            ]);
            // If validation passes, store the user
            Role::create([
                'name' => $request->name,
            ]);
            return redirect()->route('role.list')->with('success', 'User Added successful! Please login.');
        }
      
       
  
}
