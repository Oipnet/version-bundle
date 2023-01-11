<?php

namespace DependencyInjection;

use Forelse\VersionBundle\DependencyInjection\VersionExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class VersionExtensionTest extends TestCase
{

    public function testLoad()
    {
        $container = new ContainerBuilder();
        $configs = [
            [
                'app_version' => '1.0.0.0',
                'parameterbag_key' => 'test.version',
            ]
        ];

        $extension = new VersionExtension();
        $extension->load($configs, $container);

        $this->assertEquals('1.0.0.0', $container->getParameter('test.version'));
    }
    
    public function testLoadWhenParameterBagKeyIsNotDefined()
    {$container = new ContainerBuilder();
        $configs = [
            [
                'app_version' => '1.0.0.0',
            ]
        ];

        $extension = new VersionExtension();
        $extension->load($configs, $container);

        $this->assertEquals('1.0.0.0', $container->getParameter('app.version'));
        
    }
}
