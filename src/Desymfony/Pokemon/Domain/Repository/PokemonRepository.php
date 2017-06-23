<?php

namespace Desymfony\Pokemon\Domain\Repository;

use Desymfony\Pokemon\Domain\Exception\PokemonNotFoundException;
use Desymfony\Pokemon\Domain\Entity\Pokemon;

interface PokemonRepository
{
    /**
     * @param int $pokemonId
     * @return Pokemon
     * @throws PokemonNotFoundException
     */
    public function getById($pokemonId);

    /**
     * @param int[] $pokemonIds
     * @return Pokemon[]
     */
    public function getByIds($pokemonIds);

    /**
     * @param int $generation
     * @return Pokemon[]
     */
    public function getByGeneration($generation);

    /**
     * @param int $typeId
     * @return Pokemon[]
     */
    public function getByTypeId($typeId);
}
