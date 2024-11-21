<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Section;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
class User_controller extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=Role::All();
        $sections=Section::All();
        return view('user_create',compact('users','sections'));
    }
    public function store(Request $request)
    {
        // Define validation rules for user fields, including role_id
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed', // password and password_confirmation are required
            'role_id'  => 'required|array', // Validate role_id as an array (to support multiple roles)
            'role_id.*'=> 'integer|exists:roles,id', // Ensure each role_id exists in the roles table
        ];
    
        // Perform validation
        $validator = Validator::make($request->all(), $rules);
    
        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back to the create form with validation errors
            return redirect()->route('user.create')->withInput()->withErrors($validator);
        }
    
        // Create the user with the validated data
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'sections' => 'array', // Expecting an array of section IDs

        ]);
        $user->roles()->attach($request->role_id); // Sync the roles in the pivot table
        $user->sections()->attach($request->input('sections', []));

        // Redirect to home or any route with a success message
        return redirect()->route('user.show')->with('success', 'User added successfully!');
    }
    public function show()
    {
    $users = Auth::user(); 
    if (!$users) {
        return redirect()->route('user.create')->with('error', 'Student not found.');
    }
       $sections = $users->sections()->with('lectures')->get();
       $user=User::All();
        return view('user_list',compact('users','sections','user'));
    }
    public function edit($id)
   {
    $user = User::with('roles')->findOrFail($id); // This will throw an error if the user is not found
    $roles = Role::all(); // Retrieve all roles
    return view('edit_user',compact('user'),compact('roles'));
   }
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:3|confirmed', // Only hash if not empty
            'sections' => 'array', // Expecting an array of section IDs

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($id); 
    
        // Update user attributes
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sections()->sync($request->input('sections', []));

    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->roles()->attach($request->role_id); 
        $user->save(); 
    
        return redirect()->route('user.show')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
   {
    $user = User::with('roles')->findOrFail($id); 
  
    $user->delete();

    return redirect()->route('user.show')->with('success', 'User deleted successfully.');
   }
   public function showTimetable()
   {
    $users = Auth::user(); 
    if (!$users) {
        return redirect()->route('students.index')->with('error', 'Student not found.');
    }
    $sections = $users->sections()->with('lectures')->get();
    return view('timetable', compact('users', 'sections'));
   }
}