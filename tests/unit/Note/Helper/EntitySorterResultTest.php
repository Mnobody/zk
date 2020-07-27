<?php

declare(strict_types=1);

namespace App\Tests\unit\Note\Helper;

use PHPUnit\Framework\TestCase;
use App\Note\Helper\EntitySorterResult;

class EntitySorterResultTest extends TestCase
{
    public function testReturnSameData()
    {
        $s = ['a']; $d = ['b']; $n = ['c'];
        $response = new EntitySorterResult($s, $d, $n);

        $this->assertEquals($s, $response->getSave());
        $this->assertEquals($d, $response->getDelete());
        $this->assertEquals($n, $response->getNew());
    }
}
