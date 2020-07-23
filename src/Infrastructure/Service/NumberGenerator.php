<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use DateTimeImmutable;
use App\Domain\Service\NumberGeneratorInterface;

class NumberGenerator implements NumberGeneratorInterface
{
    private DateTimeImmutable $time;

    private const FORMAT = 'YmdHi';

    public function __construct(DateTimeImmutable $time)
    {
        $this->time = $time;
    }

    public function generate(): string
    {
        return $this->time->format(self::FORMAT);
    }
}
