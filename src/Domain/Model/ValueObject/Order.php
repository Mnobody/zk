<?php

declare(strict_types=1);

namespace App\Domain\Model\ValueObject;

use App\Domain\Exception\ValidationException;

class Order implements ValueObjectInterface
{
    /**
     * numbers and slashes only (cannot start or end with slash); or empty string
     */
    private const PATTERN = '/^$|^\d+(\/\d*)*(?<!\/)$/';

    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);

        $this->value = $value;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public static function getPattern(): string
    {
        return self::PATTERN;
    }

    private function validate(string $value): void
    {
        if (!preg_match(self::PATTERN, $value)) {
            throw new ValidationException;
        }
    }
}
