<?php

declare(strict_types=1);

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\Id;

interface EntityInterface
{
    public function getId(): Id;
}
