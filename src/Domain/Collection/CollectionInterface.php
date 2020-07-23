<?php

declare(strict_types=1);

namespace App\Domain\Collection;

interface CollectionInterface
{
    public function getItems(): array;
}
