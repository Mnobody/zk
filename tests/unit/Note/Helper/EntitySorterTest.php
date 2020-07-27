<?php

declare(strict_types=1);

namespace App\Tests\unit\Note\Helper;

use App\Note\Helper\EntitySorter;
use PHPUnit\Framework\TestCase;

class EntitySorterTest extends TestCase
{
    public function testSorting()
    {
        $persisted = ['a', 'b'];
        $impermanent = ['b', 'c'];
        $save = ['b'];
        $delete = ['a'];
        $new = ['c'];

        $result = (new EntitySorter)->sort($persisted, $impermanent, function($p, $i) { return $p === $i; });

        $this->assertEquals($save, $result->getSave());
        $this->assertEquals($delete, $result->getDelete());
        $this->assertEquals($new, $result->getNew());
    }
}
