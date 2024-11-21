<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;  // Optional, if you need additional auth features

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and the password matches
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The credentials do not match.',
            ], 401); // 401 Unauthorized
        }

        // Generate a token for the user
        $token = $user->createToken($user->name . '-Auth-Token')->plainTextToken;
        $user->remember_token = $token;
        $user->save();
        // Return response with token
        return response()->json([
            'message' => 'Login Successful',
            'token_type' => 'Bearer',
            'token' => $token,
            'name'=> $user->name,
            'email'=> $user->email,
        ], 200); // 200 OK
    }

    public function register(Request $request): JsonResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        try {
            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Check if user creation was successful
            if ($user) {
                // Generate a token for the user
                $token = $user->createToken($user->name . '-Auth-Token')->plainTextToken;
                $user->remember_token = $token;
                $user->save();
                // Return a success response with the token
                return response()->json([
                    'message' => 'User registered successfully',
                    'token_type' => 'Bearer',
                    'token' => $token,
                    'name'=>$user->name,
                    'email'=>$user->email,
                ], 201); // 201 Created
            } else {
                // In case user creation failed for any reason
                return response()->json([
                    'message' => 'User registration failed',
                ], 500); // 500 Internal Server Error
            }
        } catch (\Exception $e) {
            // Catch any unexpected errors and return an error response
            return response()->json([
                'message' => 'Something went wrong during registration',
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }
    public function profile(Request $request)
    {
        if($request->user())
        {
            return response()->json([
                'message'=>"profile fetched",
                'data'=>$request->user()
            ],401);
        }
        else
        {
            return response()->json([
                'message'=>"not Authenticate",
            ],401);
        }
    }
public function logout(Request $request)
{
    $user = $request->user(); 

    if ($user) {
        // Delete all tokens for the user
        $user->tokens()->delete();

        return response()->json([
            'message' => "Logged out successfully",
        ], 200);
    } else {
        return response()->json([
            'message' => "User not found",
        ], 404);
    }
}
}
