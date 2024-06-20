<?php

namespace GS\WebApp;

use function Symfony\Component\String\u;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use GS\WebApp\GSWebAppExtension;

class Configuration implements ConfigurationInterface
{
    public function __construct() {}

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(GSWebAppExtension::PREFIX);
		
        $treeBuilder->getRootNode()
            ->info(''
                . 'You can copy this example: "'
                . \dirname(__DIR__)
                . DIRECTORY_SEPARATOR . 'config'
                . DIRECTORY_SEPARATOR . 'packages'
                . DIRECTORY_SEPARATOR . 'gs_web_app.yaml'
                . '"')
            ->children()
			
				->arrayNode(GSWebAppExtension::DOCTRINE_NODE_NAME)
                    ->info('Doctrine event listeners')
					->addDefaultsIfNotSet()
					->children()
					
						->arrayNode(GSWebAppExtension::PRE_PERSIST_FOR_CREATED_AT_EVENT_LISTENER_NODE_NAME)
						->addDefaultsIfNotSet()
							->children()
								->booleanNode(GSWebAppExtension::IS_LISTEN_NODE_NAME)
									->info('Do listen to pre persist for setting created at?')
									->defaultTrue()
								->end()
								->integerNode(GSWebAppExtension::PRIORITY_NODE_NAME)
									->info('Priority')
									->defaultValue(0)
								->end()
								->scalarNode(GSWebAppExtension::CONNECTION_NODE_NAME)
									->info('EntityManager::getConnection()')
									->defaultValue('default')
								->end()
							->end()
                        ->end()
						
						->arrayNode(GSWebAppExtension::PRE_PERSIST_FOR_UPDATED_AT_EVENT_LISTENER_NODE_NAME)
						->addDefaultsIfNotSet()
							->children()
								->booleanNode(GSWebAppExtension::IS_LISTEN_NODE_NAME)
									->info('Do listen to pre update for setting updated at?')
									->defaultTrue()
								->end()
								->integerNode(GSWebAppExtension::PRIORITY_NODE_NAME)
									->info('Priority')
									->defaultValue(0)
								->end()
								->scalarNode(GSWebAppExtension::CONNECTION_NODE_NAME)
									->info('EntityManager::getConnection()')
									->defaultValue('default')
								->end()
							->end()
                        ->end()
						
                    ->end()
                ->end()
					
            ->end()
        ;
		
        return $treeBuilder;
    }

    //###> HELPERS ###
}
