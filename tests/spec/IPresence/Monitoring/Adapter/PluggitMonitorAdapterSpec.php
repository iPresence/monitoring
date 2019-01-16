<?php

namespace spec\IPresence\Monitoring\Adapter;

use Cmp\Monitoring\Monitor as Client;
use IPresence\Monitoring\Adapter\PluggitMonitorAdapter;
use IPresence\Monitoring\Monitor;
use PhpSpec\ObjectBehavior;

/**
 * @mixin PluggitMonitorAdapter
 */
class PluggitMonitorAdapterSpec extends ObjectBehavior
{
    public function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Monitor::class);
    }

    public function it_counts(Client $client)
    {
        $client->counter('name', 2, ['key1' => 'value1'])->shouldBeCalled();
        $this->counter('name', 2, ['key1' => 'value1']);
    }

    public function it_increments(Client $client)
    {
        $client->increment('name', ['key1' => 'value1'])->shouldBeCalled();
        $this->increment('name', ['key1' => 'value1']);
    }

    public function it_decrements(Client $client)
    {
        $client->decrement('name', ['key1' => 'value1'])->shouldBeCalled();
        $this->decrement('name', ['key1' => 'value1']);
    }

    public function it_monitor_gauges(Client $client)
    {
        $client->gauge('name', 3, ['key1' => 'value1'])->shouldBeCalled();
        $this->gauge('name', 3, ['key1' => 'value1']);
    }

    public function it_monitor_sets(Client $client)
    {
        $client->set('name', 'unique', ['key1' => 'value1'])->shouldBeCalled();
        $this->set('name', 'unique', ['key1' => 'value1']);
    }

    public function it_monitor_histograms(Client $client)
    {
        $client->histogram('name', 12345, ['key1' => 'value1'])->shouldBeCalled();
        $this->histogram('name',12345, ['key1' => 'value1']);
    }

    public function it_start(Client $client)
    {
        $client->start('name', ['key1' => 'value1'])->shouldBeCalled();
        $this->start('name', ['key1' => 'value1']);
    }

    public function it_ends(Client $client)
    {
        $client->end('name',  ['key1' => 'value2'])->shouldBeCalled();
        $this->end('name', ['key1' => 'value2']);
    }

    public function it_monitor_events(Client $client)
    {
        $client->event('title', 'text', 'error', ['key1' => 'value1'], null)->shouldBeCalled();
        $this->event('title', 'text', 'error', ['key1' => 'value1']);
    }
}
