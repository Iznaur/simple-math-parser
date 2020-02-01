<?php


namespace Iznaur\SimpleMathParserBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('iznaur_simple_math_parser');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('calculator_strategy')->defaultNull()->end()
            ->end();

        return $treeBuilder;
    }
}