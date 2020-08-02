<?php

declare(strict_types=1);

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\Id;

class Tag implements EntityInterface
{
    private Id $id;
    private string $name;

    public function __construct(Id $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
