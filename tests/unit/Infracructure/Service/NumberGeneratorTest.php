<?php

namespace App\Tests\unit\Infracstructure\Service;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use App\Infrastructure\Service\NumberGenerator;

final class NumberGeneratorTest extends TestCase
{
    public function testNumberFormat()
    {
        $time = '2020-07-19 15:43:13';
        $expected = '202007191543';
        $generator = new NumberGenerator(new DateTimeImmutable($time));

        $this->assertEquals($expected, $generator->generate());
    }
}
