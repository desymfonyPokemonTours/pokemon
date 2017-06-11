<?php

namespace Desymfony\Pokemon\Infrastructure\DependencyInjection\Symfony;

use Desymfony\Doctrine\DependencyInjection\Symfony\DesymfonyDoctrineExtension;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PokemonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        DesymfonyDoctrineExtension::addMappingDir(__DIR__ . '/../../Persistence/Doctrine/Mapping');

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config'));
        $this->loadServiceConfigurations($loader);
    }

    /**
     * @param YamlFileLoader $loader
     */
    private function loadServiceConfigurations(YamlFileLoader $loader)
    {
        $loader->load('parameters.yml');
        $loader->load('repositories-domain.yml');
        $loader->load('repositories-infrastructure.yml');
        $loader->load('services-domain.yml');
    }
}
