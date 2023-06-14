<?php

namespace App\Events;

use App\Models\User;
use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderUpdateEvent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $message;

    public function __construct(public Order $order, $message)
    {
        $this->message = $message;
        $this->order = $order;
    }

    public function broadcastOn()
    {
        $user = User::find($this->order->user_id)->first_name;
        // dd(User::find($this->order->user_id)->first_name, config('app.name').'_'.$user.'_'.$this->order->user_id, env('BEAM_instanceId'), env('BEAM_secretKey'));
        $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
            "instanceId" => env('BEAM_instanceId'),
            "secretKey" => env('BEAM_secretKey'),
          ));

          $user = User::find($this->order->user_id)->name;

        //   'token' => Crypt::encryptString($request->token),

        $publishResponse = $beamsClient->publishToInterests(
          array(config('app.name').'_'.$user.'_'.$this->order->user_id),
          array("web" => array("notification" => array(
            "title" => "Momo",
            "body" => $this->message,
          )),
        ));

        return new Channel('orderUpdated_'.$this->order->id.'');
    }

    public function broadcastAs()
    {
        return 'order-updated';
    }
}
