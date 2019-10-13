<?php

namespace App\Events;

use App\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    /**
     * OrderStatusUpdated constructor.
     * @param Order $order
     * 默认广播的数据
     */
    public function __construct(Order $order)
    {
        //

        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //广播多个频道
        return [
            new PrivateChannel('Order.'.$this->order->id),
            new PrivateChannel('User.'.$this->order->user_id)
        ];
    }

    /**
     * 自定义广播返回的数据---取代__construct的数据
     */
    public function broadcastWith()
    {
        return [
            'id'=>$this->order->id,
            'status'=>$this->order->status(),
            'cnStatus'=>Order::statuses[$this->order->status]
        ];
    }

}
