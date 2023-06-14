<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\FcmUserToken;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // values extracted from request
        $data = [
            'token' => $request->token, // Your token for this transaction here
            'amountInCents' => 2799, // payment in cents amount here
            'currency' => 'ZAR' // currency here
        ];

        // Anonymous test key. Replace with your key.
        $secret_key = 'sk_test_960bfde0VBrLlpK098e4ffeb53e1';

        // Initialise the curl handle
        $ch = curl_init();
        
        // Setup curl
        curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        
        // Basic Authentication method
        // Specify the secret key using the CURLOPT_USERPWD option
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // send to yoco
        $result = curl_exec($ch);
        // Log::debug(curl_getinfo($ch, CURLINFO_HTTP_CODE));

        // close the connection
        curl_close($ch);

        // convert response to a usable object
        $response = json_decode($result);

        $order  = new Order();
        $order->order = $request->order;
        $order->user_id = $request->user_id;
        $order->status = 0;
        $order->order_type = 'delivery';
        $order->latitude = json_decode($request->coordinates)[1];
        $order->longitude = json_decode($request->coordinates)[0];
        $order->address = $request->address;
        $order->save();

        $users = User::role(['Admin'])->get();
        $token = FcmUserToken::where('user_id', $users[0]->id)->first();
        // dd($token);

        $this->sendNotification('New Order Alert', 'A new order has been placed', $token->token);

        // return response()->json(['data' => $request->token]);
        return response()->json(['data' => $response]);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function sendNotification($title, $body, $token)
    {
        
        $firebaseToken = [$token];
        $SERVER_API_KEY = config('services.fcm.token');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,  
            ]
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);

    }
}
