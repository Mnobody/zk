<?php

declare(strict_types=1);

namespace App\Domain\Service\Request;

interface CreateNoteRequestInterface
{
    public function getUserId(): string;

    public function getTitle(): string;

    public function getDescription(): ?string;

    public function getOrder(): ?string;
}
