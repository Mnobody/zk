<?php

declare(strict_types=1);

namespace App\Domain\Model\ValueObject;

class Number implements ValueObjectInterface
{
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getValue(): string
    {
        return $this->number;
    }
}
