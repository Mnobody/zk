<?php

declare(strict_types=1);

namespace App\Domain\Model\Entity;

use App\Domain\Collection\Collection;
use App\Domain\Collection\Validator\Validator;
use App\Domain\Collection\Validator\Rule\TypeRule;
use App\Domain\Collection\Validator\Rule\NotEmptyRule;

class TagCollection extends Collection
{
    public function __construct(array $items)
    {
        $validator = new Validator([
            new NotEmptyRule,
            new TypeRule(Tag::class),
        ]);

        parent::__construct($items, $validator);
    }

    public function add(Tag $tag): self
    {
        return new self(
            array_merge($this->getItems(), [$tag])
        );
    }
}
