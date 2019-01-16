<?php

namespace IPresence\Monitoring\Adapter;

use Cmp\Monitoring\Monitor as Client;
use IPresence\Monitoring\Monitor;

class PluggitMonitorAdapter implements Monitor
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $metric
     * @param int    $count
     * @param array  $tags
     */
    public function counter(string $metric, int $count = 1, array $tags = [])
    {
        $this->client->counter($metric, $count, $tags);
    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function increment(string $metric, array $tags = [])
    {
        $this->client->increment($metric, $tags);
    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function decrement(string $metric, array $tags = [])
    {
        $this->client->decrement($metric, $tags);
    }

    /**
     * @param string $metric
     * @param int    $level
     * @param array  $tags
     */
    public function gauge(string $metric, int $level, array $tags = [])
    {
        $this->client->gauge($metric, $level, $tags);
    }

    /**
     * @param string $metric
     * @param mixed  $uniqueValue
     * @param array  $tags
     */
    public function set(string $metric, $uniqueValue, array $tags = [])
    {
        $this->client->set($metric, $uniqueValue, $tags);
    }

    /**
     * @param string $metric
     * @param int    $duration
     * @param array  $tags
     */
    public function histogram(string $metric, int $duration, array $tags = [])
    {
        $this->client->histogram($metric, $duration, $tags);
    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function start(string $metric, array $tags = [])
    {
        $this->client->start($metric, $tags);
    }

    /**
     * @param string $metric
     * @param array  $tags
     */
    public function end(string $metric, array $tags = [])
    {
        $this->client->end($metric, $tags);
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
        $this->client->event($title, $text, $type, $tags, $timestamp);
    }
}
