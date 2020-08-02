<?php

declare(strict_types=1);

namespace App\Domain\Model\Aggregate;

use App\Domain\Model\ValueObject\Id;

interface AggregateInterface
{
    public function getId(): Id;
}
