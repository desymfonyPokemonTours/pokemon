<?php

namespace Desymfony\Pokemon\Infrastructure\DependencyInjection\Symfony;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PokemonBundle extends Bundle
{
    /**
     * Returns the bundle's container extension class.
     *
     * @return string
     */
    protected function getContainerExtensionClass()
    {
        return PokemonExtension::class;
    }
}
