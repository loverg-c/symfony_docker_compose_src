<?php

namespace Lib\PDFBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('pdf');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->children()
            ->scalarNode('service_url')
            ->info('service_url for PDF wrapper.')
            ->isRequired()
            ->cannotBeEmpty()
            ->validate()
            ->ifTrue(function ($p) {
                return !is_string($p);
            })
            ->thenInvalid('The parameter "service_url" must be a string.')
            ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}
