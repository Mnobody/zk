<?php

declare(strict_types=1);

namespace App\Domain\Collection;

use App\Domain\Collection\Validator\ValidatorInterface;

abstract class Collection implements CollectionInterface
{
    private array $items;

    public function __construct(array $items, ValidatorInterface $validator)
    {
        $validator->validate($items);

        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
