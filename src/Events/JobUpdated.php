<?php

namespace TomSchlick\MicroManager\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

/**
 * Class JobUpdated
 *
 * @package TomSchlick\MicroManager\Events
 */
class JobUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var array
     */
    private $watchableData;

    /**
     * Create a new event instance.
     *
     * @param array $watchableData
     */
    public function __construct(array $watchableData)
    {
        $this->watchableData = $watchableData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel(config('micro-manager.broadcast.channel') . ':' . $this->watchableData['id']);
    }
}
