<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Model\ValueObject;

use App\Domain\Model\ValueObject\Id;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    public function testToStringTypeCasting()
    {
        $value = 'something';
        $this->assertEquals($value, (string) (new Id($value)));
    }

    public function testEqual()
    {
        $value = 'something';
        $this->assertTrue((new Id($value))->equals(new Id($value)));
    }
}
