<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Collection\Validator;

use PHPUnit\Framework\TestCase;
use App\Domain\Exception\ValidationException;
use App\Domain\Collection\Validator\Validator;
use App\Domain\Collection\Validator\Rule\RuleInterface;

class ValidatorTest extends TestCase
{
    public function testReturnSameRules()
    {
        $rules = [new TestRule];
        $this->assertEquals($rules, (new Validator($rules))->getRules());
    }

    public function testRulesAreExecuted()
    {
        $this->expectException(ValidationException::class);
        (new Validator([new TestRule]))->validate([]);
    }
}

class TestRule implements RuleInterface
{
    public function run(array $items): void
    {
        throw new ValidationException();
    }
}
