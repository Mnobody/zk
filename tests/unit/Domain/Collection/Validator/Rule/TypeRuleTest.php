<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Collection\Validator\Rule;

use DateTime;
use DateTimeImmutable;
use Codeception\PHPUnit\TestCase;
use App\Domain\Exception\ValidationException;
use App\Domain\Collection\Validator\Rule\TypeRule;

class TypeRuleTest extends TestCase
{
    public function testCorrectTypePasses()
    {
        // success if not exceptions
        (new TypeRule(DateTime::class))->run([new DateTime]);
    }

    public function testWrongTypeThrowsException()
    {
        $this->expectException(ValidationException::class);
        (new TypeRule(DateTime::class))->run([new DateTimeImmutable]);
    }
}
