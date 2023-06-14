<?php

namespace App\Http\Controllers;

use App\Models\FcmUserToken;
use Illuminate\Http\Request;

class FcmUserTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $fcm_token = new FcmUserToken();
        $fcm_token->token = $request->token;
        $fcm_token->user_id = $request->user_id;
        $fcm_token->save();

        return response()->json(['data' => $fcm_token]);
    }
}
