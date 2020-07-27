<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Collection\Validator\Rule;

use PHPUnit\Framework\TestCase;
use App\Domain\Exception\ValidationException;
use App\Domain\Collection\Validator\Rule\NotEmptyRule;

class NotEmptyRuleTest extends TestCase
{
    public function testNotEmptyPasses()
    {
        // success if not exceptions
        (new NotEmptyRule)->run(['something']);
    }

    public function testEmptyThrowsException()
    {
        $this->expectException(ValidationException::class);
        (new NotEmptyRule)->run([]);
    }
}
