<?php

declare(strict_types=1);

namespace App\Domain\Collection\Validator\Rule;

class NullRule implements RuleInterface
{
    public function run(array $items): void
    {
        // do nothing
    }
}
