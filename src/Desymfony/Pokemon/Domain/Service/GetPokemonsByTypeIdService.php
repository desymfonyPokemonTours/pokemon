<?php

namespace Desymfony\Pokemon\Domain\Service;

use Desymfony\Pokemon\Domain\Entity\Pokemon;
use Desymfony\Pokemon\Domain\Repository\PokemonRepository;

class GetPokemonsByTypeIdService
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
     * @param int $typeId
     * @return Pokemon[]
     */
    public function execute($typeId)
    {
        return $this->pokemonRepository->getByTypeId($typeId);
    }
}
