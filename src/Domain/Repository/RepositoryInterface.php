<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\ValueObject\Id;

interface RepositoryInterface
{
    public function nextIdentity(): Id;
}
