<?php

namespace Domains\Customer\Services;
class EventStore
{
    public static function append($eventName, $eventData): void
    {
        $event = [
            'name' => $eventName,
            'data' => $eventData,
            'timestamp' => time(),
        ];

        $logFile = storage_path('logs/events.log');
        $logString = json_encode($event) . PHP_EOL;
        file_put_contents($logFile, $logString, FILE_APPEND);
    }

    public static function getEvents($eventName): array
    {
        $logFile = storage_path('logs/events.log');
        $events = [];
        foreach (file($logFile) as $logLine) {
            $event = json_decode(trim($logLine), true);
            if ($event['name'] === $eventName) {
                $events[] = $event;
            }
        }
        return $events;
    }

    public static function getAllEvents(): array
    {
        // Read all events from the log file
        $logFile = storage_path('logs/events.log');
        $events = [];
        foreach (file($logFile) as $logLine) {
            $event = json_decode(trim($logLine), true);
            $events[] = $event;
        }
        return $events;
    }
}
