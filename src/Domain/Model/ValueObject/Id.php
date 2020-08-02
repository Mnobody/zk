<?php

declare(strict_types=1);

namespace App\Domain\Model\ValueObject;

class Id implements ValueObjectInterface
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function equals(self $id): bool
    {
        return $this->getValue() === $id->getValue();
    }
}
