<?php

namespace Desymfony\Pokemon\Domain\Service;

use Desymfony\Pokemon\Domain\Entity\Pokemon;
use Desymfony\Pokemon\Domain\Repository\PokemonRepository;

class GetPokemonsByGenerationService
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
     * @param int $generation
     * @return Pokemon[]
     */
    public function execute($generation)
    {
        return $this->pokemonRepository->getByGeneration($generation);
    }
}
