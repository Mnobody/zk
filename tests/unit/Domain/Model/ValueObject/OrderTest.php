<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Model\ValueObject;

use App\Domain\Exception\ValidationException;
use App\Domain\Model\ValueObject\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * @dataProvider correctFormat
     * @param $order
     */
    public function testCorrectFormat($order)
    {
        new Order($order);
    }

    public function correctFormat()
    {
        return [
            [''], ['1'], ['2'], ['3'], ['1/2'], ['1/3/4'], ['3/4/5/7'], ['45/33/56/3/4/1/2']
        ];
    }

    /**
     * @dataProvider wrongFormat
     * @param $order
     */
    public function testWrongFormat($order)
    {
        $this->expectException(ValidationException::class);
        new Order($order);
    }

    public function wrongFormat()
    {
        return [
            ['/'], ['1/'], ['/2'], ['/3/'], ['letters'], ['s'], [' '], ['@']
        ];
    }
}
