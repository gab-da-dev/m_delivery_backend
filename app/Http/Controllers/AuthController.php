<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestToken(Request $request)
{
    
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    $user = User::where('email', $request->email)->first();

    if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json(['error' => 'The provided credentials are incorrect.']);
    }
 
    return response()->json(['data' => ['user' => $user, 'token' => $user->createToken($user->email)->plainTextToken]]);
}
}
