<?php

declare(strict_types=1);

namespace App\Tests\unit\Infrastructure\Persistence;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Service\Persistence\EntitySorter;

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
