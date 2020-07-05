<?php

declare(strict_types=1);

namespace App\User\Service;

use App\User\Entity\User;
use App\User\Repository\UserRepository;
use Cycle\ORM\ORMInterface;
use Yiisoft\Security\PasswordHasher;
use Yiisoft\Yii\Web\User\User as UserService;

class LoginService
{
    private UserService $user;
    private ORMInterface $orm;
    private PasswordHasher $hasher;

    public function __construct(UserService $user, ORMInterface $orm, PasswordHasher $hasher)
    {
        $this->user = $user;
        $this->orm = $orm;
        $this->hasher = $hasher;
    }

    public function login(string $username, string $password): bool
    {
        /** @var UserRepository $repository */
        $repository = $this->orm->getRepository(User::class);

        /** @var User $identity */
        $identity = $repository->findByUsername($username);

        $valid = !is_null($identity) && $this->hasher->validate($password, $identity->getPasswordHash());

        return ($valid && $this->user->login($identity));
    }
}
