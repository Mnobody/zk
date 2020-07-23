<?php

declare(strict_types=1);

namespace App\Domain\Collection\Validator\Rule;

use App\Domain\Exception\ValidationException;

interface RuleInterface
{
    /**
     * @param array $items
     * @throws ValidationException
     */
    public function run(array $items): void;
}
