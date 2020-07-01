<?php

declare(strict_types=1);

namespace App\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

/**
 * @Entity(repository = "App\Repository\UserRepository")
 */
class User
{
    /** @Column(type = "bigPrimary") */
    protected int $id;

    /** @Column(type = "string") */
    protected string $username;
}
