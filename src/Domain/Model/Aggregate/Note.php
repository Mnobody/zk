<?php

declare(strict_types=1);

namespace App\Domain\Model\Aggregate;

use App\Domain\Model\Entity\Tag;
use App\Domain\Model\Entity\User;
use App\Domain\Model\ValueObject\Id;
use App\Domain\Model\ValueObject\Idea;
use App\Domain\Model\ValueObject\Order;
use App\Domain\Model\ValueObject\Number;
use App\Domain\Model\Entity\TagCollection;
use App\Domain\Model\Entity\LinkCollection;
use App\Domain\Model\ValueObject\RelatedNoteCollection;

class Note implements AggregateInterface
{
    private Id $id;
    private User $user;
    private Idea $idea;
    private Number $number;
    private TagCollection $tags;
    private RelatedNoteCollection $relatedNotes;

    private ?Order $order = null;
    private ?LinkCollection $links = null;

    public function __construct(Id $id, User $user, Idea $idea, Number $number, TagCollection $tags, RelatedNoteCollection $relatedNotes)
    {
        $this->id = $id;
        $this->user = $user;
        $this->idea = $idea;
        $this->number = $number;
        $this->tags = $tags;
        $this->relatedNotes = $relatedNotes;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getIdea(): Idea
    {
        return $this->idea;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }

    public function getTags(): TagCollection
    {
        return $this->tags;
    }

    public function getRelatedNotes(): RelatedNoteCollection
    {
        return $this->relatedNotes;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setLinks(LinkCollection $links): void
    {
        $this->links = $links;
    }

    public function getLinks(): ?LinkCollection
    {
        return $this->links;
    }

    public function addTag(Tag $tag): self
    {
        return new self(
            $this->id, $this->user, $this->idea, $this->number, $this->tags->add($tag), $this->relatedNotes
        );
    }

    public function addRelatedNote(Id $note): self
    {
        return new self(
            $this->id, $this->user, $this->idea, $this->number, $this->tags, $this->relatedNotes->add($note)
        );
    }

    public function isOwnedByUser(User $user): bool
    {
        return $this->user->getId()->equals($user->getId());
    }
}
