<?php

namespace IPresence\Monitoring\Adapter;

use IPresence\Monitoring\Monitor;

class NullMonitor implements Monitor
{
    /**
     * @param string $metric
     * @param int    $count
     * @param array  $tags
     */
    public function counter(string $metric, int $count = 1, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function increment(string $metric, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function decrement(string $metric, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param int    $level
     * @param array  $tags
     */
    public function gauge(string $metric, int $level, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param mixed  $uniqueValue
     * @param array  $tags
     */
    public function set(string $metric, $uniqueValue, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param int    $duration
     * @param array  $tags
     */
    public function histogram(string $metric, int $duration, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function start(string $metric, array $tags = [])
    {

    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function end(string $metric, array $tags = [])
    {

    }

    /**
     * @param string   $title
     * @param string   $text
     * @param string   $type
     * @param array    $tags
     * @param int|null $timestamp
     */
    public function event(string $title, string $text, string $type = self::INFO, array $tags = [], int $timestamp = null)
    {

    }
}
