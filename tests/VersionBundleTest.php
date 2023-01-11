<?php


use Forelse\VersionBundle\DependencyInjection\VersionExtension;
use Forelse\VersionBundle\VersionBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class VersionBundleTest extends TestCase
{

    public function testGetContainerExtension()
    {
        $extension = new VersionBundle();
        $containerExtension = $extension->getContainerExtension();

        $this->assertInstanceOf(ExtensionInterface::class, $containerExtension);
        $this->assertInstanceOf(VersionExtension::class, $containerExtension);
    }
}
