<?php

namespace Bme\VersionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('version');
        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode("app_version")
                    ->isRequired()
                    ->info("Version de l'application")
                    ->validate()
                        ->ifTrue(function ($value) {
                            return !preg_match('/^\d+\.\d+\.\d+\.\d+$/', $value);
                        })
                        ->thenInvalid('Le numéro de version doit respecter le format X.X.X.X')
                    ->end()
                ->end()
                ->scalarNode("parameterbag_key")
                    ->defaultValue("app.version")
                    ->info("Clef utilisé pour sauvegarder le numéro de version dans le parameter bag")
            ->end()
        ;

        return $treeBuilder;
    }
}
