<?php

namespace Desymfony\Pokemon\Infrastructure\Persistence\Doctrine\Domain\Repository;

use Desymfony\Pokemon\Domain\Exception\PokemonNotFoundException;
use Desymfony\Pokemon\Domain\Repository\PokemonRepository;
use Doctrine\ORM\EntityRepository;

class DoctrinePokemonRepository extends EntityRepository implements PokemonRepository
{
    public function getById($pokemonId)
    {
        $pokemon = $this->find($pokemonId);

        if (null === $pokemon) {
            throw new PokemonNotFoundException($pokemonId);
        }

        return $pokemon;
    }
}
