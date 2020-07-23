<?php

declare(strict_types=1);

namespace App\Domain\Service;

interface NumberGeneratorInterface
{
    public function generate(): string;
}
