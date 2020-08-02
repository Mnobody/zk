<?php

declare(strict_types=1);

namespace App\Infrastructure\Service\Persistence;

use Closure;

class EntitySorter
{
    public function sort(iterable $persisted, iterable $impermanent, Closure $equal): EntitySorterResult
    {
        $save = []; $delete = []; $new = [];

        foreach ($persisted as $p) {
            $isPersisted = false;
            foreach($impermanent as $i) {
                if ($equal($p, $i) === true) {
                    $isPersisted = true;
                    $save[] = $p;
                }
            }
            if ($isPersisted === false) {
                $delete[] = $p;
            }
        }

        foreach ($impermanent as $i) {
            $notPersisted = true;
            foreach ($persisted as $p) {
                if ($equal($p, $i) === true) {
                    $notPersisted = false;
                }
            }
            if ($notPersisted === true) {
                $new[] = $i;
            }
        }

        return new EntitySorterResult($save, $delete, $new);
    }
}
