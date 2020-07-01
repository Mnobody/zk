<?php

declare(strict_types=1);

namespace App\User;

use Yiisoft\Auth\IdentityInterface;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

/**
 * @Entity(repository = "App\User\IdentityRepository")
 */
final class Identity implements IdentityInterface
{
    /** @Column(type = "bigPrimary") */
    private string $id;

    public function __construct(string $id) {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
