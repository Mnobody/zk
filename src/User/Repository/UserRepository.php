<?php

declare(strict_types=1);

namespace App\User\Repository;

use Cycle\ORM\Select\Repository;
use Yiisoft\Auth\IdentityInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;

class UserRepository extends Repository implements IdentityRepositoryInterface
{

    public function findByUsername(string $username): ?IdentityInterface
    {
        /** @var IdentityInterface $identity */
        $identity = $this->findOne(['username' => $username]);

        return $identity;
    }

    public function findIdentity(string $id): ?IdentityInterface
    {
        /** @var IdentityInterface $identity */
        $identity = $this->findByPK($id);

        return $identity;
    }

    public function findIdentityByToken(string $token, string $type): ?IdentityInterface
    {
        throw new \Exception('Not supported.');
    }
}
