<?php

declare(strict_types=1);

namespace App\User\Service;

use App\User\Entity\User;
use Cycle\ORM\Transaction;
use Cycle\ORM\ORMInterface;
use Yiisoft\Security\Random;
use Yiisoft\Security\PasswordHasher;

class RegisterService
{
    private ORMInterface $orm;
    private PasswordHasher $hasher;

    public function __construct(PasswordHasher $hasher, ORMInterface $orm)
    {
        $this->hasher = $hasher;
        $this->orm = $orm;
    }

    public function register(string $username, string $email, string $password): bool
    {
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setStatus(User::STATUS_INACTIVE);
        $user->setAuthKey(Random::string(32));
        $user->setVerificationToken($this->token());
        $user->setPasswordHash($this->hasher->hash($password));
        $user->setPasswordResetToken($this->token());

        $transaction = new Transaction($this->orm);
        $transaction->persist($user);
        $transaction->run();

        return true;
    }

    private function token(): string
    {
        return Random::string() . '_' . time();
    }
}
