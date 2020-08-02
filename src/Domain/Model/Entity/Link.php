<?php

declare(strict_types=1);

namespace App\Domain\Model\Entity;

use App\Domain\Model\ValueObject\Id;

class Link implements EntityInterface
{
    private Id $id;
    private string $source;
    private ?string $description = null;

    public function __construct(Id $id, string $source, ?string $description = null)
    {
        $this->id = $id;
        $this->source = $source;
        $this->description = $description;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
