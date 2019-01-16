<?php

namespace IPresence\Monitoring\Symfony\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class MonitoringConfiguration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('monitoring');

        $rootNode
            ->children()
                ->scalarNode('hostname')
                    ->info('Hostname of the server')
                    ->defaultNull()
                ->end()
                ->scalarNode('prefix')
                    ->info('A prefix for all the metrics')
                    ->defaultValue('')
                ->end()
                ->variableNode('default_tags')
                    ->info('A key-value array with default tags for metrics and events')
                    ->defaultValue([])
                ->end()
                ->arrayNode('provider')
                    ->children()
                        ->arrayNode('pluggit')
                            ->children()
                                ->booleanNode('metrics')
                                    ->info('If true, metrics will be sent trough the datadog agent')
                                    ->defaultTrue()
                                ->end()
                                ->booleanNode('events')
                                    ->info('If true, events will be sent trough the datadog agent')
                                    ->defaultTrue()
                                ->end()
                                ->scalarNode('host')
                                    ->info('The datadog agent host, if null the default will be used')
                                    ->defaultNull()
                                ->end()
                                ->scalarNode('port')
                                    ->info('The datadog agent port, if null the default will be used')
                                    ->defaultNull()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
