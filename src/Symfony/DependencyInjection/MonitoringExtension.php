<?php

namespace IPresence\Monitoring\Symfony\DependencyInjection;

use Cmp\Monitoring\Monitor as PluggitMonitor;
use IPresence\Monitoring\Adapter\PluggitMonitorAdapter;
use IPresence\Monitoring\Monitor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

class MonitoringExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new MonitoringConfiguration(), $configs);

        $container->setDefinition( PluggitMonitor::class, $this->pluggitClientDefinition($config));
        $container->setDefinition(Monitor::class, $this->pluggitAdapterDefinition());
    }

    /**
     * @param array $config
     *
     * @return Definition
     */
    private function pluggitClientDefinition(array $config): Definition
    {
        return (new Definition())
            ->setFactory('Cmp\Monitoring\MonitorFactory::create')
            ->addArgument([
                'hostname' => $config['hostname'] ?? null,
                'default_tags' => $config['default_tags'] ?? [] ,
                'prefix' => $config['prefix'] ?? '',
                'datadog' => [
                    'metrics' => $config['provider']['pluggit']['metrics'] ?? true,
                    'events'  => $config['provider']['pluggit']['events'] ?? true,
                    'host'    => $config['provider']['pluggit']['host'] ?? null,
                    'port'    => $config['provider']['pluggit']['port'] ?? null,
                ],
            ]);
    }

    /**
     * @return Definition
     */
    private function pluggitAdapterDefinition(): Definition
    {
        return (new Definition())
            ->setClass(PluggitMonitorAdapter::class)
            ->addArgument(PluggitMonitor::class);
    }
}
