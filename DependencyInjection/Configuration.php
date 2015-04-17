<?php

namespace Euterpe\GoodreadsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('euterpe_goodreads');

        $rootNode
        	->children()
        		->arrayNode('keys')
        			->children()
        				->scalarNode('key')
        					->cannotBeEmpty()
        				->end()
        				->scalarNode('secret')
        					->cannotBeEmpty()
        				->end()
        			->end()
        		->end()
        		->enumNode('default_format')
        			->values(array('json', 'xml'))
        			->defaultValue('json')
        		->end()
        	->end()
        ;

        return $treeBuilder;
    }
}
