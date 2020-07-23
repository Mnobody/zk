<?php

declare(strict_types=1);

namespace App\Domain\Collection\Validator\Rule;

use App\Domain\Exception\ValidationException;

class TypeRule implements RuleInterface
{
    /**
     * class name
     * @var string
     */
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @param array $items
     * @throws ValidationException
     */
    public function run(array $items): void
    {
        foreach ($items as $item) {
            if (!$item instanceof $this->type) {
                throw new ValidationException();
            }
        }
    }
}
