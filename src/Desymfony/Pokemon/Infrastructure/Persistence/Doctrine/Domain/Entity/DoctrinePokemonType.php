<?php

namespace Desymfony\Pokemon\Infrastructure\Persistence\Doctrine\Domain\Entity;

class DoctrinePokemonType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var DoctrinePokemon
     */
    private $pokemon;

    /**
     * @var int
     */
    private $typeId;

    public function getPokemon()
    {
        return $this->pokemon;
    }

    public function getTypeId()
    {
        return $this->typeId;
    }
}
