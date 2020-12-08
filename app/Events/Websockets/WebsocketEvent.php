<?php

namespace App\Events\Websockets;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class WebsocketEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $connectionId;

    protected $apiId;

    protected $region;

    protected $stage;
    

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $connectionId, string $apiId, string $region, string $stage)
    {
        $this->connectionId = $connectionId;
        $this->apiId        = $apiId;
        $this->region       = $region;
        $this->stage        = $stage;
    }

}
