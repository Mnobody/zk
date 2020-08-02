<?php

declare(strict_types=1);

namespace App\Tests\unit\Domain\Model\Aggregate;

use App\Domain\Collection\Validator\Validator;
use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Entity\TagCollection;
use App\Domain\Model\Entity\User;
use App\Domain\Model\ValueObject\Id;
use App\Domain\Model\ValueObject\Idea;
use App\Domain\Model\ValueObject\Number;
use App\Domain\Model\ValueObject\RelatedNoteCollection;
use PHPUnit\Framework\TestCase;
use App\Domain\Model\Aggregate\Note;

class NoteTest extends TestCase
{
    public function testIsOwnedByUser()
    {
        $userId = 'something';
        $note = new Note(
            new Id(''),
            new User(new Id($userId)),
            new Idea('test_value'),
            new Number('test_value'),
            new TagCollection([new Tag(new Id(''), 'test_value')]),
            new RelatedNoteCollection([], new Validator([]))
        );
        $this->assertTrue($note->isOwnedByUser(new User(new Id($userId))));
    }
}
