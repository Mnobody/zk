<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Collection;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\Domain\Collection\Collection;
use App\Domain\Exception\ValidationException;
use App\Domain\Collection\Validator\Validator;
use App\Domain\Collection\Validator\Rule\RuleInterface;

class CollectionTest extends TestCase
{
    public function testReturnSameItems()
    {
        $items = [new DateTime, new DateTimeImmutable];
        $collection = new TestCollection($items, new Validator([]));
        $this->assertEquals($items, $collection->getItems());
    }

    public function testValidationRulesAreExecuted()
    {
        $this->expectException(ValidationException::class);
        new TestCollection([], new Validator([new TestRule]));
    }
}

class TestCollection extends Collection {}

class TestRule implements RuleInterface
{
    public function run(array $items): void
    {
        throw new ValidationException();
    }
}
