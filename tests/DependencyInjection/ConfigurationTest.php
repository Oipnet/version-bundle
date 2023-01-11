<?php

namespace DependencyInjection;

use Forelse\VersionBundle\DependencyInjection\Configuration;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\ScalarNode;

class ConfigurationTest extends TestCase
{

    public function testGetConfigTreeBuilder()
    {
        $config = new Configuration();
        $treeBuilder = $config->getConfigTreeBuilder();

        $this->assertInstanceOf(TreeBuilder::class, $treeBuilder);
        $rootNode = $treeBuilder->getRootNode()->getNode(true);
        $this->assertEquals('version', $rootNode->getName());
        $children = $rootNode->getChildren();
        $this->assertArrayHasKey('app_version', $children);
        $this->assertArrayHasKey('parameterbag_key', $children);
        
        /** @var ScalarNode  $appVersionNode */
        $appVersionNode = $children['app_version'];
        $this->assertTrue($appVersionNode->isRequired());
        $this->assertEquals("Version de l'application", $appVersionNode->getInfo());

        try {
            $appVersionNode->finalize('1.2.3.4');
            $this->assertTrue(true);
        } catch (InvalidConfigurationException $exception) {
            $this->fail('Validation fail for valid value');
        }

        $this->expectException(InvalidConfigurationException::class);
        $appVersionNode->finalize('invalid_version');

        /** @var ScalarNode  $parameterBagKey */
        $parameterBagKey = $children['parameterbag_key'];
        $this->assertEquals("Clef utilisé pour sauvegarder le numéro de version dans le parameter bag", $parameterBagKey->getInfo());
        $this->assertEquals('app.version', $parameterBagKey->getDefaultValue());        
    }
}
