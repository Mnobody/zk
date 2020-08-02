<?php

declare(strict_types=1);

namespace App\Infrastructure\Service\Persistence;

class EntitySorterResult
{
    private array $save;
    private array $delete;
    private array $new;

    public function __construct(array $save = [], array $delete = [], array $new = [])
    {
        $this->save = $save;
        $this->delete = $delete;
        $this->new = $new;
    }

    public function getSave(): array
    {
        return $this->save;
    }

    public function getDelete(): array
    {
        return $this->delete;
    }

    public function getNew(): array
    {
        return $this->new;
    }
}
