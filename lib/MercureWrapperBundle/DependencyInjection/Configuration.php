<?php

namespace Lib\MercureWrapperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('mercure_wrapper');
        $rootNode = $treeBuilder->getRootNode();
        return $treeBuilder;
    }
}
