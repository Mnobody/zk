<?php

declare(strict_types=1);

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\Id;

class User implements EntityInterface
{
    private Id $id;

    public function __construct(Id $id)
    {
        $this->id = $id;
    }

    public function getId(): Id
    {
        return $this->id;
    }
}
