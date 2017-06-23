<?php

namespace Desymfony\Pokemon\Infrastructure\Persistence\Doctrine\Domain\Repository;

use Desymfony\Doctrine\EntityRepository\DesymfonyEntityRepository;
use Desymfony\Pokemon\Domain\Entity\Pokemon;
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

    public function getByIds($pokemonIds)
    {
        $queryBuilder = $this->createQueryBuilder('pokemon');

        $queryBuilder
            ->andWhere(
                $queryBuilder->expr()->in('pokemon.id', $pokemonIds)
            )
        ;

        return $queryBuilder->getQuery()->getResult();

    }

    public function getByGeneration($generation)
    {
        $queryBuilder = $this->createQueryBuilder('pokemon');

        $queryBuilder
            ->andWhere(
                $queryBuilder->expr()->in('pokemon.generation', $generation)
            )
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    public function getByTypeId($typeId)
    {
        $queryBuilder = $this->createQueryBuilder('pokemon');

        $queryBuilder
            ->innerJoin('pokemon.pokemonTypes', 'type')
            ->andWhere('type.id = :typeId')
            ->setParameter(':typeId', $typeId)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    protected function getEntityNamespace()
    {
        return DoctrinePokemon::class;
    }
}
