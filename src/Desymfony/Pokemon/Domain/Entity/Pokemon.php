<?php

namespace Desymfony\Pokemon\Domain\Entity;

class Pokemon
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int[]
     */
    protected $typeIds;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTypeIds()
    {
        return $this->typeIds;
    }
}
