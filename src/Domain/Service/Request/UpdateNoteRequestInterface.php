<?php

declare(strict_types=1);

namespace App\Domain\Service\Request;

interface UpdateNoteRequestInterface extends CreateNoteRequestInterface
{
    public function getId(): string;
}
