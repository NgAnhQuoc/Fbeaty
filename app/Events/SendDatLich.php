<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendDatLich implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data = ['asas'];

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $dataDatLich;
    public function __construct($dataDatLich)
    {
        $this->dataDatLich = $dataDatLich;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('datlich-channel');
    }

    public function broadcastAs()
    {
        return 'DatLichEvent';
    }

    public function broadcastWith()
    {
        return ['respon'=>$this->dataDatLich];
    }
}
