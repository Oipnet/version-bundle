<?php

namespace Bme\VersionBundle;

use Bme\VersionBundle\DependencyInjection\VersionExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class VersionBundle extends Bundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        return new VersionExtension();
    }
}
