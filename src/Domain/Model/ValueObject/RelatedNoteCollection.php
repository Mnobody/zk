<?php

declare(strict_types=1);

namespace App\Domain\Model\ValueObject;

use App\Domain\Collection\Collection;
use App\Domain\Collection\Validator\Validator;
use App\Domain\Collection\Validator\Rule\TypeRule;
use App\Domain\Collection\Validator\ValidatorInterface;

class RelatedNoteCollection extends Collection
{
    private ValidatorInterface $validator;

    public function __construct(array $items, ValidatorInterface $validator)
    {
        $this->validator = new Validator(
            array_merge($validator->getRules(), [new TypeRule(Id::class)])
        );

        parent::__construct($items, $this->validator);
    }

    public function add(Id $id): self
    {
        return new self(
            array_merge($this->getItems(), [$id]), $this->validator
        );
    }
}
