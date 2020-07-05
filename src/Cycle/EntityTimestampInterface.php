<?php

declare(strict_types=1);

namespace App\Cycle;

interface EntityTimestampInterface
{
    public function setCreatedAt(int $created_at): void;

    public function getCreatedAt(): int;

    public function setUpdatedAt(int $updated_at): void;

    public function getUpdatedAt(): int;
}
