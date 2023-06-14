<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(Request $request)
    {
            $user = User::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'password' => Hash::make($request['password']),
            ])->assignRole('Client');

            return response()->json(['data' => ['user' => $user, 'token' => $user->createToken($user->email)->plainTextToken]]);
    
    }
}
