<?php

namespace Desymfony\Pokemon\Domain\Exception;

class PokemonNotFoundException extends \Exception
{
    public function __construct($pokemonId)
    {
        parent::__construct('There is no pokemon with id: '.$pokemonId);
    }
}
