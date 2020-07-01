<?php

declare(strict_types=1);

namespace App\User;

use App\Repository\UserRepository;
use Cycle\ORM\RepositoryInterface;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;

final class IdentityRepository implements IdentityRepositoryInterface
{
    /**
     * @var UserRepository|RepositoryInterface
     */
    private UserRepository $repository;

    /**
     * IdentityRepository constructor.
     * @param UserRepository|RepositoryInterface $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findIdentity(string $id) : ?IdentityInterface
    {
        $record = $this->repository->findByPK($id);

        if ($record) {
            return new Identity($record->getId);
        }

        return null;
    }

    public function findIdentityByToken(string $token, string $type) : ?IdentityInterface
    {
        throw new \Exception('Not supported.');

//        return null;
    }
}
