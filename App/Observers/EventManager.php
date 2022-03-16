<?php

declare(strict_types=1);

namespace App\Observers;

class EventManager
{
    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public function subcribe($listener): void
    {
        array_push($this->listeners, new $listener());
    }

    public function notify($eventType, $data): void
    {
        foreach ($this->listeners as $listener) {
            if ($listener->getName() == $eventType) {
                $listener->update($data);
            }
        }
    }
}
