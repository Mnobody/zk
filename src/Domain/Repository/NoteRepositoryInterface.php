<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Aggregate\Note;

interface NoteRepositoryInterface extends RepositoryInterface
{
    public function userHasAtLeastOneNote(string $userId): bool;

    public function findById(string $id): Note;

    public function create(Note $note): bool;

    public function update(Note $note): bool;
}
