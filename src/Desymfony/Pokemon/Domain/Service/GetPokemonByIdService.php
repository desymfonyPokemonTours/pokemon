<?php

namespace Desymfony\Pokemon\Domain\Service;

use Desymfony\Pokemon\Domain\Repository\PokemonRepository;

class GetPokemonByIdService
{
    /**
     * @var PokemonRepository
     */
    private $pokemonRepository;

    public function __construct(PokemonRepository $pokemonRepository)
    {
        $this->pokemonRepository = $pokemonRepository;
    }

    public function execute($pokemonId)
    {
        return $this->pokemonRepository->getById($pokemonId);
    }
}
