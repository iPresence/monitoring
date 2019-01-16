<?php

namespace IPresence\Monitoring;

interface Monitor
{
    const INFO    = 'info';
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const ERROR   = 'error';

    /**
     * Sends a counter metric
     *
     * @param string $metric     Metric Name
     * @param int    $count      Count value
     * @param array  $tags       Metric Tags
     *
     * @return $this
     */
    public function counter(string $metric, int $count = 1, array $tags = []);

    /**
     * Increments a metric in 1 point
     *
     * @param string $metric     Metric name
     * @param array  $tags       Metric Tags
     *
     * @return $this
     */
    public function increment(string $metric, array $tags = []);

    /**
     * Decrements a metric in 1 point
     *
     * @param string $metric     Metric name
     * @param array  $tags       Metric tags
     *
     * @return $this
     */
    public function decrement(string $metric, array $tags = []);

    /**
     * Sends a gauge metric
     *
     * @param string  $metric     Metric name
     * @param int     $level      Gauge level
     * @param array   $tags       Metric tags
     *
     * @return $this
     */
    public function gauge(string $metric, int $level, array $tags = []);

    /**
     * Sends a set metric
     *
     * @param string $metric      Metric name
     * @param mixed  $uniqueValue Metric unique value
     * @param array  $tags        Metric tags
     *
     * @return $this
     */
    public function set(string $metric, $uniqueValue, array $tags = []);

    /**
     * Sends an histogram
     *
     * @param string $metric     Metric name
     * @param int    $duration   Duration of the metric in milliseconds
     * @param array  $tags       Metric tags
     *
     * @return $this
     */
    public function histogram(string $metric, int $duration, array $tags = []);

    /**
     * Starts a timer metric
     *
     * @param string $metric     Metric name
     * @param array  $tags       Metric tags
     *
     * @return $this
     */
    public function start(string $metric, array $tags = []);

    /**
     * Ends a previously started timer
     *
     * @param string $metric Metric name
     * @param array  $tags   Extra tags to set for the metric
     *
     * @return $this
     */
    public function end(string $metric, array $tags = []);

    /**
     * Sends an event
     *
     * @param string   $title     Event title
     * @param string   $text      Event text description
     * @param string   $type      Event type
     * @param array    $tags      Event tags
     * @param int|null $timestamp Event timestamp, null for now
     *
     * @return $this
     */
    public function event(string $title, string $text, string $type = self::INFO, array $tags = [], int $timestamp = null);
}
