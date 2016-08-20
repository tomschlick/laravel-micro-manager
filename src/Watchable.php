<?php

namespace TomSchlick\MicroManager;

use Ramsey\Uuid\Uuid;

/**
 * Class Watchable
 *
 * @package TomSchlick\MicroManager
 */
trait Watchable
{
    public $watchableData = [
        'id'           => null,
        'type'         => null,
        'status'       => null,
        'progress'     => 0,
        'tries'        => 1,
        'last_message' => null,
        'last_ping_at' => null,
        'created_at'   => null,
        'updated_at'   => null,
        'started_at'   => null,
        'completed_at' => null,
    ];

    /**
     * @param string|null $id
     *
     * @return string
     */
    public function setWatchableId(string $id = null) : string
    {
        $this->watchableData['id'] = $id ?: Uuid::uuid4();

        return $this->watchableData['id'];
    }

    /**
     * @return string
     */
    public function getWatchableId() : string
    {
        return array_get($this->watchableData, 'id', $this->setWatchableId());
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function markStatus(string $status) : self
    {
        array_set($this->watchableData, 'status', $status);

        return $this;
    }

    /**
     * @return int
     */
    public function getProgress() : int
    {
        return array_get($this->watchableData, 'progress', 0);
    }

    /**
     * @param int $percentage
     *
     * @return self
     */
    public function setProgress(int $percentage) : self
    {
        array_set($this->watchableData, 'progress', $percentage);

        return $this;
    }

    /**
     * @param string|null $datetime
     *
     * @return $this
     */
    public function setLastPingAt(string $datetime = null)
    {
        array_set($this->watchableData, 'last_ping_at', $datetime ?: date('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * @return self
     */
    public function pingWatcher() : self
    {
        $this->setLastPingAt();

        // Ping endpoint with full payload

        return $this;
    }

}
