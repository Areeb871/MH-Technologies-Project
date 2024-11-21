<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.login_page');
       /* return view('users.dashboard');*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.resgister_page');
    }
    public function dashboard()
    {
        return view('users.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    /*
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
        // dd($request->all());
    
        // Perform validation
        $validator = Validator::make($request->all(), $rules);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->route('users.index')
                             ->withInput()
                             ->withErrors($validator);
        }
    
        // Create a new user instance
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->confirmpassword = Hash::make($request->confirmpassword); // Hash the password
    
        // Save the user to the database
        $user->save();
        // dd($user);
    
        // Redirect to a success page or login page
        return redirect()->route('users.login')->with('success', 'User registered successfully!');
    }
        */
        public function store(Request $request)
        {
            // Validate input
            $request->validate([
                'firstname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
                'lastname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:3', 'confirmed'], // confirmed rule here
            ]);
            // If validation passes, store the user
            User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'confirmpassword' => Hash::make($request->confirmpassword),
            ]);
        
            return redirect()->route('users.login')->with('success', 'Registration successful! Please login.');
        }
      
        public function show()
        {
            $catagerys=Category::All();
            $subcatagerys = Subcategory::with(['products' => function($query) {
                $query->take(3); // Limit to 3 products per subcategory
            }])->whereIn('subcategories_name', ['Dell', 'Hp']) // Specify the names
              ->get();
            return view('users.landing_page',compact('subcatagerys'),compact('catagerys'));
        }    
    public function authenticate(Request $request)
    {
    
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:3'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user() && Auth::user()->id == 1) {  // Ensure Auth::user() is not null
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('landingpage');
            }
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

    }
    public function displayallproduct($id)
        {
            $products = Product::findOrFail($id);
            // dd($products);
            $catagerys=Category::All();
            $subcatagerys=Subcategory::All();
            
            return view('users.displayproduct',[
                'products' => $products,
            ]);
        } 
        public function displayallproduct1($id)
        {
            // Find the subcategory by ID
    $subcategory = Subcategory::findOrFail($id);

    // Get products belonging to this subcategory
    $products = Product::where('subcategory_id', $subcategory->id)->get();

    return view('users.displayallproduct', compact('products', 'subcategory'));
        } 
     
    
}