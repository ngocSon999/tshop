<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $count;
    public function __construct($count)
    {
        $this->count = $count;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('Send-Contact');
    }

    public function broadcastAs(): string
    {
        return 'ContactEvent';
    }

}
