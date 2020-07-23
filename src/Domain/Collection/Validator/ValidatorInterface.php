<?php

declare(strict_types=1);

namespace App\Domain\Collection\Validator;

use App\Domain\Exception\ValidationException;
use App\Domain\Collection\Validator\Rule\RuleInterface;

interface ValidatorInterface
{
    /**
     * @param array $items
     * @throws ValidationException
     */
    public function validate(array $items): void;

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array;
}
