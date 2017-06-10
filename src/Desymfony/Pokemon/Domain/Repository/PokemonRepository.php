<?php

namespace Desymfony\Pokemon\Domain\Repository;

use Desymfony\Pokemon\Domain\Exception\PokemonNotFoundException;
use Desymonfy\Pokemon\Domain\Entity\Pokemon;

interface PokemonRepository
{
    /**
     * @param int $pokemonId
     * @return Pokemon
     * @throws PokemonNotFoundException
     */
    public function getById($pokemonId);
}
