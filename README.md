# VersionBundle

Se bundle permet de charger le numéro de version de l'application en lisant le fichier version.yaml du dossier config/packages

## Installation

L'installation se fait via composer.

```shell
composer require bme/version-bundle
```

## Utilisation

Le numéro de version de l'application est alors disponible dans le ParameterBag

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
