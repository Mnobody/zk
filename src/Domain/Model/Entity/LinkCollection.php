<?php

declare(strict_types=1);

namespace App\Domain\Model\Entity;

use App\Domain\Collection\Collection;
use App\Domain\Collection\Validator\Validator;
use App\Domain\Collection\Validator\Rule\TypeRule;

class LinkCollection extends Collection
{
    public function __construct(array $items)
    {
        $validator = new Validator([
            new TypeRule(Link::class)
        ]);

        parent::__construct($items, $validator);
    }

    public function add(Link $link): self
    {
        return new self(
            array_merge($this->getItems(), [$link])
        );
    }
}
