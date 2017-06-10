<?php

namespace Desymfony\Pokemon\Infrastructure\DependencyInjection\Symfony;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PokemonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        if (false === $container->hasParameter('environment')) {
            throw new \InvalidArgumentException('The container builder needs to have a parameter called "environment"');
        }

//        SuntransfersDoctrineExtension::addMappingDir(__DIR__ . '/../../Persistence/Doctrine/Mapping');

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . DIRECTORY_SEPARATOR . 'config'));
        $this->loadServiceConfigurations($loader, $this->getEnvironmentValue($container));
    }

    /**
     * @param YamlFileLoader $loader
     * @param string         $environment
     */
    private function loadServiceConfigurations(YamlFileLoader $loader, $environment)
    {
        $loader->load('parameters.yml');
        $loader->load('repositories-domain.yml');
        $loader->load('repositories-infrastructure.yml');
        $loader->load('services-domain.yml');
    }

    private function getEnvironmentValue(ContainerBuilder $container)
    {
        $environmentValue = $container->getParameter('environment');

        if ($this->isSymfonyParameterNotResolved($environmentValue)) {
            return $this->resolveSymfonyParameter($environmentValue, $container);
        }
        return $environmentValue;
    }

    private function isSymfonyParameterNotResolved($environmentValue)
    {
        return false !== strpos($environmentValue, '%');
    }

    private function resolveSymfonyParameter($environmentValue, ContainerBuilder $container)
    {
        $environmentParameter = str_replace('%', '', $environmentValue);
        return $container->getParameter($environmentParameter);
    }
}
