<?php

namespace Desymfony\Pokemon\Infrastructure\Persistence\Doctrine\Domain\Entity;

use Desymfony\Pokemon\Domain\Entity\Pokemon;

class DoctrinePokemon extends Pokemon
{
    /**
     * @var DoctrinePokemonType[]
     */
    protected $pokemonTypes;

    public function getTypeIds()
    {
        $typeIds = [];

        foreach ($this->pokemonTypes as $pokemonType) {
            $typeIds = $pokemonType->getTypeId();
        }

        return $typeIds;
    }
}
