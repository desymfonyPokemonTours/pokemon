<?php

namespace Desymfony\Pokemon\Domain\Service;

use Desymfony\Pokemon\Domain\Entity\Pokemon;
use Desymfony\Pokemon\Domain\Repository\PokemonRepository;

class GetPokemonsByIdsService
{
    /**
     * @var PokemonRepository
     */
    private $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    /**
     * @param int[] $pokemonIds
     * @return Pokemon[]
     */
    public function execute($pokemonIds)
    {
        return $this->pokemonRepository->getByIds($pokemonIds);
    }
}
