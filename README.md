# VersionBundle

This bundle allows to load the version number of the application by reading the version.yaml file in the config/packages folder

## Setup

Use composer to install

```shell
composer require forelse/version-bundle
```

## Usage

The version number of the application is then available in the ParameterBag

```php

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ParameterBagInterface $parameterBag): Response
    {
        $version = $parameterBag->get('app.version');
    }
}

```
