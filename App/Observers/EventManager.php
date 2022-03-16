<?php

namespace App\Observers;

use App\Listeners\isAdmin;
use App\Listeners\isConnected;


class EventManager
{

    private $listeners;

    function __construct()
    {
        $this->listeners = array(
            new isConnected(),
            new isAdmin()
        );
    }

    public function subcribe($eventType, $listener)
    {
        array_push($listeners, $eventType, $listener);
    }

    public function dispatch($eventType, $data)
    {
        foreach ($this->listeners as $listener) {
            if ($listener->getName() == $eventType) {
                $listener->notify($data);
            }
        }
    }
}
