<?php

namespace IPresence\Monitoring\Symfony\DependencyInjection;

use Cmp\Monitoring\MonitorFactory;
use Cmp\Monitoring\Monitor as CmpMonitor;
use IPresence\Monitoring\Adapter\NullMonitor;
use IPresence\Monitoring\Adapter\PluggitMonitor;
use IPresence\Monitoring\Monitor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Reference;

class MonitoringExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new MonitoringConfiguration(), $configs);

        $class = NullMonitor::class;
        if (isset($config['provider']['pluggit'])) {
            $class = $this->definePluggitMonitor( $container, $config);
        }

        $container->setAlias(Monitor::class, $class);
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     *
     * @return string
     */
    private function definePluggitMonitor(ContainerBuilder $container, array $config): string
    {
        $container->setDefinition( CmpMonitor::class, (new Definition())
            ->setFactory([MonitorFactory::class, 'create'])
            ->addArgument([
                'hostname' => $config['hostname'] ?? null,
                'default_tags' => $config['default_tags'] ?? [],
                'prefix' => $config['prefix'] ?? '',
                'datadog' => [
                    'metrics' => $config['provider']['pluggit']['metrics'] ?? true,
                    'events'  => $config['provider']['pluggit']['events'] ?? true,
                    'host'    => $config['provider']['pluggit']['host'] ?? null,
                    'port'    => $config['provider']['pluggit']['port'] ?? null,
                ],
            ]));

        $container->setDefinition(PluggitMonitor::class, (new Definition())
            ->addArgument(new Reference(CmpMonitor::class)));

        return PluggitMonitor::class;
    }
}
