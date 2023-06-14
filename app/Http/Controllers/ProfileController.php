<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\FcmUserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::find($request->user_id);
        return response()->json(['data' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'last_name' => 'nullable|string',
            'first_name' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'current_password' => 'nullable',
            'new_password' => 'nullable',
        ]);
        
        $user = User::find($request->user_id);
        // dd(isset($request->current_password),Hash::check($request->current_password, $user->password));
        
        // TODO password reset logic review
        if(isset($request->current_password)){
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['error' => 'The provided password does not match your current password.']);
                # code...
            }
            // $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
        }
        
        $user->update([
            'last_name' => $request->last_name ?? $user->last_name,
            'first_name' => $request->first_name ?? $user->first_name,
            'phone_number' => $request->phone_number ?? $user->phone_number,
            'password' => Hash::make($request->password) ?? $user->password,
        ]);
        // dd($user);
        $user->save();

        return response()->json(['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
