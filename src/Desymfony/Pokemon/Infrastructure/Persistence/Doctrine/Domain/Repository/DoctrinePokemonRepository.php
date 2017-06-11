<?php

namespace Desymfony\Pokemon\Infrastructure\Persistence\Doctrine\Domain\Repository;

use Desymfony\Doctrine\EntityRepository\DesymfonyEntityRepository;
use Desymfony\Pokemon\Domain\Exception\PokemonNotFoundException;
use Desymfony\Pokemon\Domain\Repository\PokemonRepository;
use Desymfony\Pokemon\Infrastructure\Persistence\Doctrine\Domain\Entity\DoctrinePokemon;

class DoctrinePokemonRepository extends DesymfonyEntityRepository implements PokemonRepository
{
    public function getById($pokemonId)
    {
        $pokemon = $this->find($pokemonId);

        if (null === $pokemon) {
            throw new PokemonNotFoundException($pokemonId);
        }

        return $pokemon;
    }

    protected function getEntityNamespace()
    {
        return DoctrinePokemon::class;
    }
}
