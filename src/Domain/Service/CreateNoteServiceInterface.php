<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Service\Request\CreateNoteRequestInterface;

interface CreateNoteServiceInterface
{
    public function execute(CreateNoteRequestInterface $request): void;

    public function isRelatedNotesRequired(string $userId): bool;
}
