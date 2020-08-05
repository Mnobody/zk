<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Service\Request\UpdateNoteRequestInterface;

interface UpdateNoteServiceInterface
{
    public function execute(UpdateNoteRequestInterface $request): void;
}
