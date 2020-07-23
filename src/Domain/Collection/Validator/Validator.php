<?php

declare(strict_types=1);

namespace App\Domain\Collection\Validator;

use App\Domain\Exception\ValidationException;
use App\Domain\Collection\Validator\Rule\RuleInterface;

class Validator implements ValidatorInterface
{
    /**
     * @var RuleInterface[]
     */
    private array $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param array $items
     * @throws ValidationException
     */
    public function validate(array $items): void
    {
        /** @var RuleInterface $rule */
        foreach ($this->rules as $rule) {
            $rule->run($items);
        }
    }
}
